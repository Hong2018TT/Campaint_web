<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    protected $table = 'depo';
    protected $fillable = [
        'Name_EN',
        'Name_KH',
        'Address_EN',
        'province_EN',
        'Address_KH',
        'province_KH',
        'Phone',
        'GPS',
    ];
}
