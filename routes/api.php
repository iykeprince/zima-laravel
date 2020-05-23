<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group([
    'middleware' => 'auth.jwt'
], function ($router) {
    Route::get('getUser', 'Api\AuthController@getAuthUser');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::get('getShop', 'Api\AuthController@getShop');
    Route::post('logout', 'Api\AuthController@logout');
    /*Product*/
    Route::resource('products', 'Api\Shop\Product\ProductController');
    
});

/*Market*/
Route::resource('markets', 'Api\Shop\Market\MarketController');
Route::resource('markets.shops', 'Api\Shop\Market\MarketShopController');
Route::resource('markets.products', 'Api\Shop\Market\MarketProductController', ['only' => 'index']);

/* * Shop*/
Route::resource('shops', 'Api\Shop\Shop\ShopController', ['except' => ['create', 'edit']]);
Route::resource('shops.products', 'Api\Shop\Shop\ShopProductController', ['only' => ['index']]);
/*Category*/
Route::resource('categories', 'Api\Shop\Category\CategoryController');
Route::resource('categories.subcategories', 'Api\Shop\Category\CategorySubcategoryController');
Route::resource('categories.products', 'Api\Shop\Category\CategoryProductController');
/*Sub Category*/
Route::resource('subcategories', 'Api\Shop\SubCategory\SubCategoryController');
Route::resource('subcategories.products', 'Api\Shop\SubCategory\SubCategoryProductController');
