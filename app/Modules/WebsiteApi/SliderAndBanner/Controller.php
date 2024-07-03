<?php

namespace App\Modules\WebsiteApi\SliderAndBanner;

use App\Modules\WebsiteApi\SliderAndBanner\Actions\HeroSlider;
use App\Modules\WebsiteApi\SliderAndBanner\Actions\HeroSliderSideBanner;

use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function HeroSlider()
    {
        $data = HeroSlider::execute();
        return $data;
    }
    public function HeroSliderSideBanner()
    {
        $data = HeroSliderSideBanner::execute();
        return $data;
    }



}
