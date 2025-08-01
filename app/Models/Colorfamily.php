<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colorfamily extends Model
{
    protected $table = 'colorfamilys';
    protected $fillable = [
        'name',
        'name_kh',
        'color_code',
        'parent',
        'status',
    ];
}
