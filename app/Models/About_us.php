<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About_us extends Model
{
    use HasFactory;

    protected $table = 'about_us'; // Define the correct table name

    // protected $primaryKey = 'id';

    protected $fillable = [
        'description_khmer',
        'description_english',
    ];

    public $timestamps = true; // Enable timestamps (created_at, updated_at)
}
