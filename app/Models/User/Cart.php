<?php

namespace App\Models\User;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'user_id',
        'product_id',
        'product_size_id',
        'product_color_id',
        'qty',
        'price',
        'total_price',
        'product_weight_price',
        'status',

    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
