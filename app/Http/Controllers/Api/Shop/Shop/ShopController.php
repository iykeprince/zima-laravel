<?php

namespace App\Http\Controllers\Api\Shop\Shop;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return response()->json($shops, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json($e->getMessage(), 500);
        }
       
        $shop = new Shop();
        $shop->market_id = $request->market_id;
        $shop->user_id = $user->id;
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->email = $request->email;
        $shop->phone_number = $request->phone_number;
        $shop->facebook_handle = $request->facebook_handle ?: null;
        $shop->twitter_handle = $request->twitter_handle ?: null;
        $shop->instagram_handle = $request->instagram_handle ?: null;
        
        $shop->save();

        return response()->json(['data' => $shop, 'message' => 'Shop was created!'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ShopModels\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return response()->json($shop, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ShopModels\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->market_id = $request->market_id;
        $shop->user_id = $request->user_id;
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->email = $request->email;
        $shop->phone_number = $request->phone_number;
        $shop->facebook_handle = $request->facebook_handle ?: null;
        $shop->twitter_handle = $request->twitter_handle ?: null;
        $shop->instagram_handle = $request->instagram_handle ?: null;
        
        $shop->save();
        return response()->json(['data' => $shop, 'message' => 'Shop was updated!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ShopModels\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }

    //uploadLogoImage
    public function uploadLogoImage(Request $request){
        $shopId = $request->shop_id;
        $userId = $request->user_id;
        $logo = $request->file('logo');
        $name = time().'-'.$logo->getClientOriginalName();
        $extension = $logo->getClientOriginalExtension();
        $dir = '/shops/logos/';
        $filename = $dir.$name.'.'.$extension;
        // $path = $request->file('logo')->store($filename, 'local');
        Storage::disk('public')->put($filename, File::get($logo));

        $shop = Shop::find($shopId);
        $shop->logo = '/uploads/'.$filename;
        $shop->save();

        return response()->json([
            'logo_url' => '/uploads/'.$filename, 
            'message' => 'logo image uploaded'], 200);
    }

    //uploadCoverImage
    public function uploadCoverImage(Request $request){
        $shopId = $request->shop_id;
        $bannerImage = $request->file('banner_image');
        $name = time().'-'.$bannerImage->getClientOriginalName();
        $extension = $bannerImage->getClientOriginalExtension();
        $dir = '/shops/banners/';
        $filename = $dir.'/'.$name.'.'.$extension;
        Storage::disk('public')->put($filename, File::get($bannerImage));
        
        $shop = Shop::find($shopId);
        $shop->banner_image = '/uploads/'.$filename;
        $shop->save();

        return response()->json([
            'banner_url' => '/uploads/'.$filename, 
            'message' => 'Banner image uploaded'], 200);
    }
}
