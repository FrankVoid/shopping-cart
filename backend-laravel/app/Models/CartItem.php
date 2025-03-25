<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $table = 'cart_items';
    protected $fillable = ['cart_id', 'item_id', 'quantity'];
    use HasFactory;

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
