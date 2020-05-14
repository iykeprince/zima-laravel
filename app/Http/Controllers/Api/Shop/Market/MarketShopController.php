<?php

namespace App\Http\Controllers\Api\Shop\Market;

use App\Http\Controllers\Api\Controller;
use App\ShopModels\Market;
use Illuminate\Http\Request;

class MarketShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($market)
    {
        $shops = Market::find($market)->with('shops')->first();
        return response()->json($shops, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ShopModels\Market $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ShopModels\Market $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ShopModels\Market $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ShopModels\Market $market
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        //
    }
}
