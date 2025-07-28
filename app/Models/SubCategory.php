<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'subcategories';

    // Add fillable attributes
    protected $fillable = ['name', 'category_id'];

    // Define the relationship back to `Category`
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
