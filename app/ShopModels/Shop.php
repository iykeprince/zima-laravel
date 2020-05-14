<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    public $fillable = [
        'name',
        'address',
        'email',
        'phone_number'
    ];

    /*
     * A shop has more than one products
     * A product belongs to a shop
     * One to Many*/
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
