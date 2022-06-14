<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    // protected $fillable = array('name');
    protected $table    = 'heroes';
    protected $guarded  = ['_token','id'];

    public static $rules = [
        'hero_img' 					=>  'required|mimes:jpeg,jpg,png,svg',
    ];

    public static $messages = [
       'hero_img.required'  =>'Hero image is required',
       'hero_img.mimes'     =>'Format is Incorrect !',
    ];
}
