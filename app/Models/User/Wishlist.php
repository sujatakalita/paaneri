<?php

namespace App\Models\User;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
     use SoftDeletes;
     protected $table="wishlists";
     protected $fillable=["product_id","user_id","qty"];
     public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
