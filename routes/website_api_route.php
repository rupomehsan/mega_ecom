<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/nav-categories', 'Api\CategoryController@featured');
    Route::get('/brands', 'Api\CategoryController@brands');
    Route::get('/varients', 'Api\CategoryController@varients');

    Route::get('/category/{slug}', 'Api\CategoryController@category');

    Route::get('/featured-products', 'Api\ProductController@featured_products');
});


Route::get('/set-question', function () {
    DB::table('product_questions')->update(['is_approved' => 1]);
});

Route::get('/set-is-available', function () {
    $data =  DB::table('products')->where('purchase_price', 0)->update(['is_available' => 0]);
});
Route::get('/pget', function () {
    $data =  DB::table('products')->where('id', 184)->first();
    return $data;
});

Route::get('/fixed-discount-product', function () {
    $products = DB::table('products')->whereColumn('customer_sales_price', 'discount_amount')->get();

    foreach ($products as $product) {
        $new_discount_amount = ($product->customer_sales_price * 5 / 100);
        DB::table('products')
            ->where('id', $product->id)
            ->update(['discount_amount' => $new_discount_amount]);
    }
});

Route::get('/set-related-products', function () {
    DB::table('related_product')->truncate();
    for ($i = 1; $i <= 10; $i++) {
        DB::table('related_product')->insert([
            'product_id' => 1,
            'related_product_id' => $i + 1,
        ]);
    }
});
Route::get('/set-related-compare-products', function () {
    DB::table('related_compare_product')->truncate();
    for ($i = 1; $i <= 10; $i++) {
        DB::table('related_compare_product')->insert([
            'product_id' => 1,
            'related_product_id' => $i + 1,
        ]);
    }
});
Route::get('/set-related-price-review-products', function () {
    DB::table('price_review_product')->truncate();
    for ($i = 1; $i <= 10; $i++) {
        DB::table('price_review_product')->insert([
            'product_id' => 1,
            'related_product_id' => $i + 1,
        ]);
    }
});
