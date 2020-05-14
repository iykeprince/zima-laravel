<?php

namespace App\Http\Controllers\Api\Shop\Category;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Category;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products;
        return response()->json($products, 200);
    }

}
