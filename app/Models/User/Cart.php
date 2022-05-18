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
        'qty',
        'price',
        'total_price',
        'deleted_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
