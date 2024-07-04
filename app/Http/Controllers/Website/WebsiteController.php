<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\modules\ProductManagement\Product\Models\Model as ProductModel;

class WebsiteController extends Controller
{
    public function home()
    {
        return Inertia::render('Home/Index', [
            'event' => [
                'title' => 'ETEK Enterprise',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }

    public function blogs()
    {
        return Inertia::render('Blogs/Index', [
            'event' => [
                'title' => 'ETEK Blogs',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }
    public function blogDetails()
    {
        return Inertia::render('Blogs/Details', [
            'event' => [
                'title' => 'ETEK Blog Details',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }

    public function products($slug)
    {
        $page = request()->page ? request()->page : 1;
        return Inertia::render('Products/Index', [
            'slug' => $slug,
            'page' => $page,
            'event' => [
                'title' => 'ETEK Products',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }

    public function products_details($slug)
    {
        // $product = ProductModel::where('slug', $slug)->first();
        return Inertia::render('ProductDetails/Index', [
            'slug' => $slug,
            // 'product_details' => $product,
            'event' => [
                'title' => 'ETEK Product Details',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }

    public function cart()
    {
        return Inertia::render('Cart/Index', [
            'event' => [
                'title' => 'ETEK Cart',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }

    public function checkout()
    {
        return Inertia::render('Checkout/Index', [
            'event' => [
                'title' => 'ETEK Checkout',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }
    public function contact()
    {
        return Inertia::render('Contact/Index', [
            'event' => [
                'title' => 'ETEK Contact Us',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }
    public function about()
    {
        return Inertia::render('About/Index', [
            'event' => [
                'title' => 'ETEK About Us',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }
    public function terms_conditions()
    {
        return Inertia::render('TermsConditions/Index', [
            'event' => [
                'title' => 'ETEK Terms & Conditions',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }
    public function returns_exchanges()
    {
        return Inertia::render('ReturnsExchanges/Index', [
            'event' => [
                'title' => 'ETEK Returns & Exchanges',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }
    public function shipping_Delivery()
    {
        return Inertia::render('ShippingDelivery/Index', [
            'event' => [
                'title' => 'ETEK Shipping & Delivery',
                'image' => 'https://etek.com.bd/frontend/images/etek_logo.png',
                'description' => 'Best eCommerce in bangladesh'
            ]
        ]);
    }

}
