<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }
}
