<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CfdiFiscalRegime extends Model
{
    use HasFactory;

    protected $fillable = [
        'regime_code',
        'description',
        'natural',
        'legal',
        'start_date',
        'end_date',
    ];
}
