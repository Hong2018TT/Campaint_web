<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Color_families extends Model
{
    use HasFactory;
    protected $table = 'color_families';
    protected $fillable = [
        'name',
        'name_kh',
        'color_code',
        'parent',
        'status',
    ];
}
