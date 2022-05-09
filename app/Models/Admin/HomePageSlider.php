<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageSlider extends Model
{
    use SoftDeletes;

    protected $fillable=['for_h1_tag','for_h4_tag','button_text','button_url','slider_images','status'];
}
