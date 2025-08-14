<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    protected $table = 'depo';
    public $timestamps = false; // ✅ You must add this line
    protected $fillable = [
        'Name_EN',
        'Name_KH',
        'Address_EN',
        'province_EN',
        'Address_KH',
        'province_KH',
        'Phone',
        'GPS',
        'is_active',
    ];
}
