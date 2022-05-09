<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttachment extends Model
{
    use SoftDeletes;
    protected $table="product_attachments";
    protected $fillable=['product_id','colour_id','product_image_server_url','is_default'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
