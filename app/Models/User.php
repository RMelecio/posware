<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        return $this->join('model_has_roles', function($q) {
            $q->on('users.id', '=', 'model_has_roles.model_id')
                ->where('model_has_roles.model_type', 'App\\Models\\User');
        })->join('role_has_permissions', 'model_has_roles.role_id', '=', 'role_has_permissions.role_id')
        ->join('permissions', function($q){
            $q->on('role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('type', 'header');
        })->orderBy('permissions.label')
        ->select('permissions.label', 'permissions.icon')
        ->get();
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($this->name . ' ' . $this->middle_name . ' ' . $this->last_name),
        );
    }
}
