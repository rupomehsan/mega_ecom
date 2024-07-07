<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\ProductManagement\Product\Models\Model as Product;
use Illuminate\Cache\RateLimiting\Limit;

class ProductController extends Controller
{
    public function featured_products()
    {
        $data = Product::where('is_featured', 1)->with('product_image')->limit(100)->get();
        return $data;
    }

    public function product($slug)
    {
        $data = Product::where('slug', $slug)
            ->with([
                'product_image',
            ])
            ->first();
        return response()->json($data);
    }
}
