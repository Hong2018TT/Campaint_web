<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // In app/Models/Product.php
    protected $fillable = [
        'Name_EN',
        'Name_KH',
        'brand',
        'price_after_discount',
        'discount_percent',
        'original_price',
        'color_type',
        'size',
        'image_url',     // Main image
        'img_url1',      // <--- CHANGE THIS TO MATCH YOUR DATABASE COLUMN NAME
        'img_url2',      // <--- CHANGE THIS TO MATCH YOUR DATABASE COLUMN NAME
        'img_url3',      // <--- CHANGE THIS TO MATCH YOUR DATABASE COLUMN NAME
        'img_url4',      // <--- CHANGE THIS TO MATCH YOUR DATABASE COLUMN NAME
        'description',
        'delivery_option',
        'stock_quantity',
        'category_id',
        'sub_category_id',
        'status',
    ];
}
