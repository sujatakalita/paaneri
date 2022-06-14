<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeasurment extends Model
{
    use SoftDeletes;
    protected $table="product_measurments";
    protected $fillable=['product_id','filed_type','is_required','name','status','amount','deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productMeasurmentOptions(){
        return $this->hasMany(ProductMeasurmentOption::class);
    }

    public static function measurmentAlredyUse($product_id, $name)
    {
        $find=ProductMeasurment::where('product_id',$product_id)->where('name',$name)->get()->count();
        if($find>0){
            return true;
        }else{
            return false;
        }
    }
}
