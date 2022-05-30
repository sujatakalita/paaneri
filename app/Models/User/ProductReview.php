<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    // protected $fillable = array('name');
    protected $table    = 'product_reviews';
    protected $guarded  = ['_token','id'];

    public static $rules = [
        'name'        =>  'required',
        'email'        =>  'required',
        'review'        =>  'required',
    ];

    public static $messages = [
       'name.required'  =>  'Please enter your name',
       'email.required'  =>  'Please enter your email',
       'review.required'  =>  'Please write a review',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Admin\Product', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
