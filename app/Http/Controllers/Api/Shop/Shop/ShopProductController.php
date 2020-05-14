<?php

namespace App\Http\Controllers\Api\Shop\Shop;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Shop;

class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Shop $shop)
    {
        $products = $shop->products;

        return response()->json($products, 200);
    }


}
