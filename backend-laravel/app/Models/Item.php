<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'items';
    protected $fillable = ['name', 'quantity', 'price'];
    use HasFactory;

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'item_id');
    }

}
