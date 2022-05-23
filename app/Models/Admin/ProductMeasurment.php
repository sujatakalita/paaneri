<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeasurment extends Model
{
    use SoftDeletes;
    protected $table="product_measurments";
    protected $fillable=['product_id','filed_type','is_required','name','status','amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productMeasurmentOptions(){
        return $this->hasMany(productMeasurmentOptions::class);
    }
}
