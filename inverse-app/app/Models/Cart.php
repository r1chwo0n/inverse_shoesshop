<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Hasfactory;
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_size_id',
        'quantity',
        'size',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
