<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTransaction extends Model
{
    use SoftDeletes;
    protected $table="order_transactions";
    protected $fillable=[
        'order_id',
        'user_id',
        'product_size_id',
        'product_color_id',
        'weight',
        'product_weight_price',
        'qty',
        'price',
        'total_price',
        'product_id'
    ];
}
