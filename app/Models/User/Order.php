<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table="orders";
    protected $fillable=[
        'user_id',
        'transaction_id',
        'order-time',
        'cgst',
        'sgst',
        'total_price',
        'total_price_with_tax',
        'discount_amt',
        'address_id',
        'confirmation_time',
       'delivery_boy_id',
        'delivery_date',
        'delivery_charge',
        'coupon_id',
        'status'
    ];
}
