<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'categories';

    // Add fillable attributes for mass assignment
    protected $fillable = ['name', 'created_at', 'updated_at'];

    // Correct relationship to `SubCategory`
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
