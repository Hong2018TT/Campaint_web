<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{
    protected $table = 'about_us';
    
    protected $fillable = [
        'description_khmer',
        'description_english',
    ];
}
