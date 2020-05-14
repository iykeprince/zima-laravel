<?php

namespace App\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public $fillable = [
        'market_name',
        'market_city',
        'market_state',
        'market_country'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
