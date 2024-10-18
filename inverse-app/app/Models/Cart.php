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
    ];
}
