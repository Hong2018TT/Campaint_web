<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'PROCODE',
        'prefix',
        'PROVINCE',
        'PROVINCE_KH',
    ];
}
