<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        \App\User::truncate();
        \App\ShopModels\Category::truncate();
        \App\ShopModels\SubCategory::truncate();
        \App\ShopModels\Market::truncate();
        \App\ShopModels\Shop::truncate();
        \App\ShopModels\Product::truncate();

        $usersQuantity = 50;
        $categoriesQuantity = 5;
        $subCategoryQuantity = 20;
        $marketQuantity = 25;
        $shopQuantity = 100;
        $productsQuantity = 500;

        factory(\App\User::class, $usersQuantity)->create();
        factory(\App\ShopModels\Category::class, $categoriesQuantity)->create();
        factory(\App\ShopModels\SubCategory::class, $subCategoryQuantity)->create();
        factory(\App\ShopModels\Market::class, $marketQuantity)->create();
        factory(\App\ShopModels\Shop::class, $shopQuantity)->create();
        factory(\App\ShopModels\Product::class, $productsQuantity)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
