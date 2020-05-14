<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'user_id',
        'name',
        'price',
        'image',
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
