<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'name',
        'trade_name',
        'fiscal_regime_id',
        'country_id',
        'state',
        'municipality',
        'location',
        'settlement',
        'postal_code',
        'address',
        'mobil',
        'email',
    ];
}
