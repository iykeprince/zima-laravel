<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'contact_address' => $faker->address,
        'state' => $faker->state,
        'country' => $faker->country,
        'zipcode' => $faker->postcode,
        'dob' => $faker->dateTimeBetween('-30 years', '-15 years'),
        'zima_ticket' => $faker->numberBetween(0, 1),
        'zima_classified' => $faker->numberBetween(0, 1),
        'zima_shop' => $faker->numberBetween(0, 1),
        'zima_payment' => $faker->numberBetween(0, 1),
        'zima_money' => $faker->numberBetween(0, 1),
        'zima_logistics' => $faker->numberBetween(0, 1),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];


});

$factory->define(\App\ShopModels\Market::class, function (Faker $faker) {
    $marketName = $faker->company;
    $slug = str_replace([' ', '.'], '-', $marketName);
    return [
        'name' => $marketName,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'slug' => $slug
    ];
});

$factory->define(\App\ShopModels\Shop::class, function (Faker $faker) {
    $company = $faker->company;
    $companyEmail = $faker->companyEmail;
    $facebook = 'https://facebook.com/' . $company;
    $twitter = 'https://twitter.com/' . $company;
    $instagram = 'https://instagram.com/' . $company;
    return [
        'market_id' => $faker->numberBetween(1, 10),
        'user_id' => User::all()->random()->id,
        'name' => $faker->company,
        'address' => $faker->streetAddress,
        'email' => $companyEmail,
        'phone_number' => $faker->phoneNumber,
        'banner_image' => $faker->imageUrl(),
        'logo' => $faker->imageUrl(30, 30),
        'facebook_handle' => $facebook,
        'twitter_handle' => $twitter,
        'instagram_handle' => $instagram,
        'views' => random_int(100, 9999)
    ];
});

$factory->define(\App\ShopModels\Category::class, function (Faker $faker) {
    $category = $faker->domainName;
    $slug = str_replace([' ', '.'], '-', $category);
    $image = $faker->imageUrl(30, 30);

    return [
        'name' => $category,
        'description' => $faker->sentence(1),
        'slug' => $slug,
        'image' => $image
    ];
});

$factory->define(\App\ShopModels\SubCategory::class, function (Faker $faker) {
    $category = $faker->domainName;
    $slug = str_replace([' ', '.'], '-', $category);
    $image = $faker->imageUrl(30, 30);

    return [
        'category_id' => \App\ShopModels\Category::all()->random()->id,
        'name' => $category,
        'description' => $faker->sentence(1),
        'slug' => $slug,
        'image' => $image
    ];
});

$factory->define(\App\ShopModels\Product::class, function (Faker $faker) {
    $category_id = \App\ShopModels\Category::all()->random()->id;
    $sub_category_id = \App\ShopModels\SubCategory::all()->random()->id;
    $shop_id = \App\ShopModels\Shop::all()->random()->id;
    $name = $faker->sentence(1);
    $slug = str_replace([' ', '.'], '-', $name);

    return [
        'category_id' => $category_id,
        'sub_category_id' => $sub_category_id,
        'shop_id' => $shop_id,
        'name' => $name,
        'price' => $faker->numberBetween(120, 3000),
        'image' => $faker->imageUrl(400, 400),
        'views' => random_int(100, 9999),
        'slug' => $slug
    ];
});
