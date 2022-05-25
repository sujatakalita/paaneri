<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;
    protected $table = "home_page_sliders";
    protected $fillable = ['button_text','button_url','slider_images','status'];

}
