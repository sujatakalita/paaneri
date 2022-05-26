<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartProductMeasurmentOptionDetail extends Model
{
    use SoftDeletes;
    protected $table = "cart_product_measurment_option_details";
    protected $fillable = [
        'cart_id',
        'user_id',
        'product_measurment_id',
        'product_measurment_option_id',
        'name',
        'amount',
    ];
}
