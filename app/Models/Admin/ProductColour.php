<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColour extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'product_id',
        'colour',
        'is_default'
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
   
}
