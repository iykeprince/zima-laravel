<?php

namespace App\Http\Controllers\Api\Shop\Product;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Market;
use App\ShopModels\Shop;
use App\ShopModels\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth.jwt', ['except' => ['show','getProducts']]);
    }

    public function getProducts(){
        // $products = DB::table('products')
        // ->join('shops', 'products.shop_id', '=', 'shops.id')
        // ->join('markets', 'shops.market_id', '=', 'markets.id')
        // ->select('products.*', 'shops.user_id', 'markets.name as market_name', 'shops.name as shop_name')
        // ->get();
        $products = Product::with('shop.market')->orderBy('created_at', 'desc')->limit(16)->get();
        return response()->json($products, 200);
    }
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
        
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $productName = $request->name;
        $slug = str_replace(' ', '-', $request->name);
        //

        foreach($request->images as $image){
            $photoName = time().'.'.$image->getClientOriginalExtension();
            // $filename = $image->move(public_path("products"), $photoName);
            $filename = $image->store("public/products/{$categoryId}/{$subCategoryId}/{$productName}");
            array_push($files, $filename);
        }
   
        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'shop_id' => $request->shop_id,
            'name' => $request->name,
            'price' => $request->price,
            'images' => json_encode($files),
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
        $product = $product->with(['shop.market', 'category'])->where('id', $product->id)->first();
        // $product->images = json_decode($product->images);
        $markets = Market::all();
        $similarProducts = $product->with(['shop.market', 'category'])->where('category_id', $product->category_id)->limit(5)->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'product' => $product,
            'markets' => $markets,
            'similar_products' => $similarProducts
        ], 200);
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
