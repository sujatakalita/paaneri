<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MegaMenuCategory extends Model
{
    use SoftDeletes;

    protected $fillable=['id','mega_menu_id','category_id'];

    public function megaMenu()
    {
        return $this->belongsTo(megaMenu::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id');
    }
}
