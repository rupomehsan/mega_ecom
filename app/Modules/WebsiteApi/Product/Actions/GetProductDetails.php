<?php

namespace App\Modules\WebsiteApi\Product\Actions;

class GetProductDetails
{
    static $ProductModel = \App\Modules\ProductManagement\Product\Models\Model::class;

    public static function execute($slug)
    {
        try {

            $with = [
                'product_images:id,product_id,url',
                'product_categories:id,title',
                'product_brand:id,title',
                'product_region',
                'product_region.country',
                'related_compare_products',
                'related_compare_products.product_image:id,product_id,url',
                'product_reviews',
                // 'related_price_review:id,title,customer_sales_price',
            ];

            $fields = request()->input('fields') ?? ['*'];
            if (empty($fields)) {
                $fields = ['*'];
            }
            if (!$data = self::$ProductModel::query()
                ->with([
                    ...$with,
                    // "related_price_review" => function ($q) {
                    //     $q->where('is_available', 1)->select('id', 'title', 'customer_sales_price');
                    // }
                ])
                ->select($fields)->where('slug', $slug)->first()) {
                return messageResponse('Data not found...', $data, 404, 'error');
            }

            $relatedProductArray = [];
            $tabFooter = ["Actions"];
            if (!empty($data->related_compare_products)) {
                $title = ['title'];
                $image = ['image'];
                $price = ['price'];
                $brand = ['brand'];
                $availability = ['availability'];
                $rating = ['rating'];
                $spacification = ['spacification'];
                $product_id = ['id'];

                foreach ($data->related_compare_products as $key => $item) {
                    $title[] = $item->title;
                    $image[] = "<img src='/{$item->product_image->url}' alt='' width='100' height='100'>";
                    $price[] = "<del>{$item->customer_sales_price}৳</del> {$item->current_price}৳";
                    $brand[] = $item->product_brand->title;
                    $availability[] = $item->is_available ? 'In Stock' : 'Out of Stock';
                    $rating[] = $item->average_rating;
                    $spacification[] = $item->short_description;
                    $product_id[] = $item->id;
                }

                $relatedProductArray[] = $title;
                $relatedProductArray[] = $image;
                $relatedProductArray[] = $price;
                $relatedProductArray[] = $brand;
                $relatedProductArray[] = $availability;
                $relatedProductArray[] = $rating;
                $relatedProductArray[] = $spacification;
                $relatedProductArray[] = $product_id;
            }

            // $data['related_compare_products_filter'] = $relatedProductArray;
            $data->related_compare_products_filter = $relatedProductArray;
            // $data['related_compare_products_filter_footer'] = $tabFooter;
            $data->related_compare_products_filter_footer = $tabFooter;

            $data->related_price_review = $data->related_price_review()->where('is_available', 1)->select('title', 'customer_sales_price')->get();
            return entityResponse($data);
        } catch (\Exception $e) {

            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}
