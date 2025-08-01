<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calculate_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'net_weight',
        'coverage_area',
        'status',
    ];
}
