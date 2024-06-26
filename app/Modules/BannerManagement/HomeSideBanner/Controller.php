<?php

namespace App\Modules\BannerManagement\HomeSideBanner;

use App\Modules\BannerManagement\HomeSideBanner\Actions\All;
use App\Modules\BannerManagement\HomeSideBanner\Actions\Destroy;
use App\Modules\BannerManagement\HomeSideBanner\Actions\Show;
use App\Modules\BannerManagement\HomeSideBanner\Actions\Store;
use App\Modules\BannerManagement\HomeSideBanner\Actions\Update;
use App\Modules\BannerManagement\HomeSideBanner\Actions\SoftDelete;
use App\Modules\BannerManagement\HomeSideBanner\Actions\Restore;
use App\Modules\BannerManagement\HomeSideBanner\Actions\Import;
use App\Modules\BannerManagement\HomeSideBanner\Validations\BulkActionsValidation;
use App\Modules\BannerManagement\HomeSideBanner\Validations\GetAllValidation;
use App\Modules\BannerManagement\HomeSideBanner\Validations\Validation;
use App\Modules\BannerManagement\HomeSideBanner\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index(GetAllValidation $request)
    {
        $data = All::execute($request);
        return $data;
    }

    public function store(Validation $request)
    {
        $data = Store::execute($request);
        return $data;
    }

    public function show($slug)
    {
        $data = Show::execute($slug);
        return $data;
    }

    public function update(Validation $request, $slug)
    {
        $data = Update::execute($request, $slug);
        return $data;
    }

    public function softDelete()
    {
        $data = SoftDelete::execute();
        return $data;
    }
    public function destroy($slug)
    {
        $data = Destroy::execute($slug);
        return $data;
    }
    public function restore()
    {
        $data = Restore::execute();
        return $data;
    }
    public function import()
    {
        $data = Import::execute();
        return $data;
    }
    public function bulkAction(BulkActionsValidation $request)
    {
        $data = BulkActions::execute($request);
        return $data;
    }

}