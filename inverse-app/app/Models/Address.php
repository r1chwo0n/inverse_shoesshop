<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address_line_1', 'address_line_2', 'address_line_3', 'street', 'subdistrict', 'district', 'province', 'postal_code'
    ];

    public function user()
    {
        return $this->hasOne(Address::class);
        return $this->belongsTo(User::class);
    }

}
