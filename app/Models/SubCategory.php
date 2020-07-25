<?php

namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'main_categories';

    protected $fillable = [
        'translation_lang', 'translation_of', 'name','parent_id', 'slug', 'photo', 'active', 'created_at', 'updated_at'
    ];

//    protected static function boot()
//    {
//        parent::boot();
//        MainCategory::observe(MainCategoryObserver::class);
//    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id', 'translation_lang', 'name','parent_id', 'slug', 'photo', 'active', 'translation_of');
    }

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';

    }

    // get all translation category
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'category_id' , 'id');
    }


//    public function vendors(){
//
//        return $this -> hasMany('App\Models\Vendor','category_id','id');
//    }

    public function scopeDefaultCategory($query){
        return $query-> where('translation_of',0);

    }

}
