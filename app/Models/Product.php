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
    protected $primaryKey = 'product_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_EN',
        'Name_KH',
        'brand',
        'price_after_discount',
        'discount_percent',
        'original_price',
        'color_type',
        'size',
        'image_url',
        'image_slide1',
        'image_slide2',
        'image_slide3',
        'image_slide4',
        'description',
        'delivery_option',
        'stock_quantity',
        'category_id',
        'sub_category_id',
    ];
}
