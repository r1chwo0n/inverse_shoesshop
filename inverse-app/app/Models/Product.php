<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'color',
        'stock', 
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
