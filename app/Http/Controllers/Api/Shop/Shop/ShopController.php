<?php

namespace App\Http\Controllers\Api\Shop\Shop;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Shop;
use Illuminate\Http\Request;

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
        $bannerImage = '';
        $logoImage = '';

        if ($request->hasFile('banner_image')) {
            $bannerImage = '';
        }
        if ($request->hasFile('logo')) {
            $logoImage = '';
        }

        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json($e->getMessage(), 500);
        }
//        return response()->json(['user' => auth()->user()], 200);

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
        $shop->banner_image = $bannerImage;
        $shop->logo = $logoImage;
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
        //
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
}
