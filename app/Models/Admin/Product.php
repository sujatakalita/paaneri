<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use SoftDeletes;
    use Rateable;
    
    protected $table="products";
    protected $fillable=['category_id','sub_category_id','title','slug','code','video_url','description','market_price','selling_price','total_product','available_product','is_available','status','product_delivery_status','weight','discount','discount_rate'];


    public function productAttachment()
    {
        return $this->hasMany(ProductAttachment::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->hasMany(ProductCategory::class,'sub_category_id');
    }
    public static function activeProduct(){
        return $products=Product::where('is_available',1)->where('status',1)->get();
    }
    public function productColor()
    {
        return $this->hasMany(ProductColour::class);
    }

    public function productCategory()
    {
        return $this->hasMany(ProductCategory::class);
    }
    public function productColour()
    {
        return $this->hasMany(ProductColour::class);
    }
    public function productSize()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productMeasurment(){
        return $this->hasMany(ProductMeasurment::class);
    }
}

