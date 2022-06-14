<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProductMeasurmentOptionDetail extends Model
{
    use SoftDeletes;
    protected $table="order_product_measurment_option_details";
    protected $fillable=[
        'user_id',
        'order_id',
        'product_id',
        'product_measurment_id',
        'product_measurment_option_id',
        'amount',
    ];
}
