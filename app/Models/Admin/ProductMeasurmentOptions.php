<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeasurmentOptions extends Model
{
    use SoftDeletes;
    protected $table="product_measurment_options";
    protected $fillable=['product_id','product_measurment_id','name','amount'];

    public function productMeasurment()
    {
        return $this->belongsTo(productMeasurment::class);
    }
}
