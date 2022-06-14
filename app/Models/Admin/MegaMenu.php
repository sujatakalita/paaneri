<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MegaMenu extends Model
{
    use SoftDeletes;
    protected $table = 'mega_menu';
    protected $fillable = [
        'name',
        'slug',
        'mega_menu_type',
        'status',
        'image',
        'deleted_at'
    ];
    public static function getAll(){
       return Megamenu::select('id','name','slug','mega_menu_type','status','image')->get();
    }
    public static function getActiveAll(){
        return Megamenu::select('id','name','slug','mega_menu_type','status','image')->where('status',1)->get();
    }
    public function megaMenuCategory()
    {
        return $this->hasMany(MegaMenuCategory::class,'mega_menu_id');
    }
}
