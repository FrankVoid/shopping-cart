<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name'];
    use HasFactory;

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    public function carts()
    {
        return $this->hasOne(Cart::class, 'customer_id');
    }
}
