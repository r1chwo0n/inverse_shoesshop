<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes'; // Ensure this matches your migration file

    protected $fillable = [
        'size', // The size description (e.g., M 4 | W 5)
        'shoes',
        'stock'
    ];

    // Define the relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class, 'size_id');
    }
}
