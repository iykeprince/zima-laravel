<?php

namespace App\Http\Controllers\Api\Shop\SubCategory;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\SubCategory;

class SubCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubCategory $subCategory)
    {
        $products = $subCategory->products;
        return response()->json($products, 200);
    }

}
