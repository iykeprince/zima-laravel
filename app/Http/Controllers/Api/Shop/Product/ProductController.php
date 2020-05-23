<?php

namespace App\Http\Controllers\Api\Shop\Product;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Shop;
use App\ShopModels\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $userId = auth()->user()->id; 
        $products = DB::table('products')
                    ->join('shops', 'products.shop_id', '=', 'shops.id')
                    ->select('products.*', 'shops.user_id', 'shops.name as shop_name')
                    ->where('shops.user_id', $userId)
                    ->get();

        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $files = [];
        $validatedData = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'images' => 'required',
        ]);
        
        
        // foreach($request->images as $image){

        //     // $filename = $image->store('public/products');
        //     // // substr($filename, strlen('public/'));
        //     $files[] = $image;
        // }
        // print_r($files);
        // return;

        // $data = $request->all();
        // $data->images = json_encode(['https://imagesfromsomewher.jpg', 'https://imagesfromthesameplace.jpg']);
        $slug = str_replace(' ', '-', $request->name);

        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'shop_id' => $request->shop_id,
            'name' => $request->name,
            'price' => $request->price,
            'views' => $request->views,
            'slug' => $slug
        ]);

        return response()->json(['product' => $product, 'message' => 'product was saved successfully and added to your shop!'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ShopModels\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = $product->with('shop.market')->where('id', $product->id)->first();
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ShopModels\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ShopModels\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        $product->delete();
        return response()->json(['message' => 'Product has been removed from shop', 'product' => $product], 200);
    }

    //helpers
    protected function getUploadImages(Request $request){
        $imageList = [];
        $images = $request->file('images[]');
       echo  json_encode($request);
        // if(sizeof($images) > 0 && sizeof($images) < 3){
        //     foreach($images as $image){
        //         json_encode($image);
        //     }
        // }else{
        //     return "Product Image should not exceed 3";
        // }

    }
}
