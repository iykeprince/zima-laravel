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
        'image',
        'views',
        'slug'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
