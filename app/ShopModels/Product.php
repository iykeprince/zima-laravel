<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'shop_id',
        'name',
        'price',
        'images',
        'views',
        'slug'
    ];

    public function getImagesAttribute($value){
        return json_decode($value, true);
    }

    public function setImagesAttributes($value){
        $this->attribute['images'] = json_encode($value);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory() 
    {
        return $this->belongsTo(SubCategory::class);
    }
}
