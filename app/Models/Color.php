<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    public $timestamps = false; // ✅ You must add this line
    protected $fillable = [
        'color_code',
        'color_name',
        'r',
        'g',
        'b',
        'product_type',
        'color_family',
        'status',
    ];
}
