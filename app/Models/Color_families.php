<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color_families extends Model
{
    protected $table = 'color_families';
    protected $fillable = [
        'name',
        'name_kh',
        'color_code',
        'parent',
    ];
}
