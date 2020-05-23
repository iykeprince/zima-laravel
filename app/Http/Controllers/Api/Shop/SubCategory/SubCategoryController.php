<?php

namespace App\Http\Controllers\Api\Shop\SubCategory;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return response()->json($subcategories, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ShopModels\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $subCategories = Category::with('subcategories')->where('id', $category)->first();
        return response()->json($subCategories, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ShopModels\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ShopModels\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
