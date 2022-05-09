<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable=['parent_id','name','slug','category_image','status','seoTitle','seoDescription','seoKeywords','canonicalUrl'];

    public function subCategory()
    {
      return $this->hasMany(Category::class, 'parent_id');
    }
    public function parentCategory()
    {
      return $this->belongsTo(Category::class, 'parent_id');
    }
    public function products()
      {
          return $this->hasMany(Product::class);
      }
      public function megaMenuCategory()
    {
        return $this->belongsTo(megaMenuCategory::class);
    }

      public static function categoryAlredyUse($name)
      {
          $find=Category::where('name',$name)->get()->count();
          if($find>0){
              return true;
          }else{
              return false;
          }
      }

}
