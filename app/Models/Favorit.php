<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $guarded = [];

     // favorit relationship
     public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

      // favorit relationship
      public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }
}
