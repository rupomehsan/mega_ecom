<?php

namespace App\Modules\WebsiteApi\SearchHandling\Actions;

class HomePageGlobalSearch
{
    static $productModel = \App\Modules\ProductManagement\Product\Models\Model::class;
    static $productCategoryModel = \App\Modules\ProductManagement\ProductCategory\Models\Model::class;
    static $productBrandModel = \App\Modules\ProductManagement\ProductBrand\Models\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());


            $searchKey = request()->input('search_key');

            $product = self::$productModel::with('product_image:product_id,url')
                ->where(function ($q) use ($searchKey) {
                    $q->where('title', $searchKey)
                        ->orWhere('title', 'like', '%' . $searchKey . '%')
                        ->orWhere('description', 'like', '%' . $searchKey . '%')
                        ->orWhere('short_description', 'like', '%' . $searchKey . '%');
                })
                ->where("status", "active")
                ->paginate(10, ['id', 'title', 'slug', 'purchase_price']);

            $category = self::$productCategoryModel::where(function ($q) use ($searchKey) {
                $q->where('title', $searchKey);
                $q->orWhere('title', 'like', '%' . $searchKey . '%');
                $q->orWhere('search_keywords', 'like', '%' . $searchKey . '%');
            })->limit(10)
                ->where("status", "active")
                ->paginate(10, ['title', 'slug', 'image']);

            $brand = self::$productBrandModel::where(function ($q) use ($searchKey) {
                $q->where('title', $searchKey);
                $q->orWhere('title', 'like', '%' . $searchKey . '%');
            })->limit(10)
                ->where("status", "active")
                ->paginate(10, ['title', 'slug', 'image']);

            $data = [
                "product" => $product,
                "category" => $category,
                "brand" => $brand,
            ];

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
