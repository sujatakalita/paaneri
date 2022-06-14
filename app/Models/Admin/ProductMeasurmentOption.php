<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeasurmentOption extends Model
{
    use SoftDeletes;
    protected $table="product_measurment_options";
    protected $fillable=['product_id','product_measurment_id','name','amount','deleted_at'];

    public function productMeasurment()
    {
        return $this->belongsTo(productMeasurment::class);
    }

    public static function measurmentOptionAlredyUse($product_id, $product_measurment_id, $name)
    {
        $find=ProductMeasurmentOption::where('product_id',$product_id)->where('product_measurment_id',$product_measurment_id)->where('name', $name)->get()->count();
        if($find>0){
            return true;
        }else{
            return false;
        }
    }
}
