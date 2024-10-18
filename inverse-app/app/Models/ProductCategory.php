<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories'; // Ensure this matches your migration file

    protected $fillable = [
        'name', // The name of the category
    ];

    // Define the relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
