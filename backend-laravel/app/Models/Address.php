<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'addresses';
    protected $fillable = ['line_1', 'line_2', 'city', 'state', 'zip', 'customer_id'];
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'address_id');
    }
}
