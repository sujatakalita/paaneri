<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSize extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'product_id',
        'unit_name',
        'is_active'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
