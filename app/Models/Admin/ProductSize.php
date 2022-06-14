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
        'is_active',
        'deleted_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function sizeAlredyUse($product_id, $unit_name)
    {
        $find=ProductSize::where('product_id',$product_id)->where('unit_name',$unit_name)->get()->count();
        if($find>0){
            return true;
        }else{
            return false;
        }
    }
}
