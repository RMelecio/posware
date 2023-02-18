<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function menu()
    {
        $headers = $this->join('model_has_roles', function(JoinClause $q) {
            $q->on('users.id', '=', 'model_has_roles.model_id');
            $q->where('model_has_roles.model_type', 'App\\Models\\User');
        })
        ->join('role_has_permissions', 'model_has_roles.role_id', '=', 'role_has_permissions.role_id')
        ->join('permissions', function($q){
            $q->on('role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('type', 'header');
        })
        ->orderBy('permissions.label')
        ->select('permissions.id', 'permissions.label', 'permissions.icon')
        ->get();

        foreach ($headers as $keyHeader => $header) {
            $menus = Permission::join('role_has_permissions', function(JoinClause $join) use ($header) {
                $join->on('role_has_permissions.permission_id', '=', 'permissions.id');
                $join->where('permissions.parent_permission', $header->id);
            })->join('model_has_roles', function(JoinClause $join) {
                $join->on('role_has_permissions.role_id', '=', 'model_has_roles.model_id');
                $join->where('model_has_roles.model_type', 'App\\Models\\User');
                $join->where('model_has_roles.model_id', $this->id);
            })->get();

            foreach ($menus as $keyMenu => $menu) {
                $menus[$keyMenu]['options'] = $options = Permission::where('parent_permission', $menu->id)
                    ->where('type', 'option')
                    ->orderBy('label')
                    ->get();
            }
            $headers[$keyHeader]['menus'] = $menus;
        }
        return $headers;
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($this->name . ' ' . $this->middle_name . ' ' . $this->last_name),
        );
    }
}
