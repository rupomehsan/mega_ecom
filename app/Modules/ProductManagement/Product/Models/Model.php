<?php

namespace App\Modules\ProductManagement\Product\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $productCategoryModel = \App\Modules\ProductManagement\ProductCategory\Models\Model::class;
    static $productCategoryGroupModel = \App\Modules\ProductManagement\ProductCategoryGroup\Models\Model::class;
    static $productBrandModel = \App\Modules\ProductManagement\ProductBrand\Models\Model::class;
    static $productImageModel = \App\Modules\ProductManagement\Product\Models\ProductImageModel::class;
    static $productVariantPriceModel = \App\Modules\ProductManagement\Product\Models\ProductVarientPriceModel::class;
    static $ProductRegionModel = \App\Modules\ProductManagement\Product\Models\ProductRegionModel::class;
    static $relatedCompareProductModel = \App\Modules\ProductManagement\Product\Models\RelatedCompareProductModel::class;
    static $ProductModel = \App\Modules\ProductManagement\Product\Models\Model::class;
    static $ProductReviewModel = \App\Modules\WebsiteApi\ProductReview\Models\Model::class;


    protected $table = "products";
    protected $guarded = [];
    protected $appends = ['current_price', 'amount_in_percent', 'is_discount', 'average_rating'];
    protected $casts = [
        'specifications' => 'array'
    ];


    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            // $data->slug = Str::slug($slug); //use Illuminate\Support\Str;
            // if (strlen($data->slug) > 150) {
            //     $data->slug = substr($data->slug, strlen($data->slug) - 150, strlen($data->slug));
            // }
            if (auth()->check()) {
                $data->creator = auth()->user()->id;
            }
            $data->save();
        });
    }
    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }

    public function product_categories()
    {
        return $this->belongsToMany(self::$productCategoryModel, 'product_category_products', 'product_id', 'product_category_group_id', 'product_category_id', 'id');
    }
    public function product_category_group_products()
    {
        return $this->belongsToMany(self::$productCategoryGroupModel, 'product_category_products', 'product_id', 'product_category_group_id',  'id');
    }
    public function product_brand()
    {
        return $this->belongsTo(self::$productBrandModel, 'product_brand_id');
    }

    public function product_image()
    {
        return $this->hasOne(self::$productImageModel, 'product_id', 'id');
    }
    public function product_images()
    {
        return $this->hasMany(self::$productImageModel, 'product_id', 'id');
    }

    public function product_verient_price()
    {
        return $this->hasMany(self::$productVariantPriceModel, 'product_id', 'id');
    }
    public function product_region()
    {
        return $this->hasMany(self::$ProductRegionModel, 'product_id', 'id');
    }
    public function product_reviews()
    {
        return $this->hasMany(self::$ProductReviewModel, 'product_id');
    }

    public function related_compare_products()
    {
        return $this->belongsToMany(
            self::$ProductModel,
            'related_compare_product',
            'product_id',
            'related_product_id'
        );
    }
    public function related_products()
    {
        return $this->belongsToMany(
            self::$ProductModel,
            'related_product',
            'product_id',
            'related_product_id'
        );
    }
    public function related_price_review()
    {
        return $this->belongsToMany(
            self::$ProductModel,
            'price_review_product',
            'product_id',
            'related_product_id'
        );
    }
    public function offer_products()
    {
        return $this->belongsToMany(
            self::$ProductModel,
            'product_offer_product',
            'product_id',
            'product_offer_id'
        );
    }


    public function product_varient_price()
    {
        return $this->hasMany(self::$productVariantPriceModel, 'product_id', 'id');
    }

    /**
     * accessors.
     */


    public function getAverageRatingAttribute()
    {
        return $this->product_reviews()->avg('rating') ?? 0;
    }

    public function getCurrentPriceAttribute()
    {
        $price = $this->customer_sales_price;

        if ($this->discount_amount && $this->discount_type) {
            switch ($this->discount_type) {
                case 'percent':
                    $price -= ($this->customer_sales_price * ($this->discount_amount / 100));
                    break;
                case 'flat':
                    $price -= $this->discount_amount;
                    break;
            }
        }

        return $price;
    }


    public function getAmountInPercentAttribute()
    {
        if (($this->discount_amount && $this->discount_type) && $this->discount_type != 'percent') {
            switch ($this->discount_type) {
                case 'flat':
                    return ($this->discount_amount / $this->customer_sales_price) * 100;
            }
        }

        return 0;
    }

    public function getIsDiscountAttribute()
    {
        if ($this->discount_type == 'off') {
            return false;
        } else {
            return true;
        }
    }
}
