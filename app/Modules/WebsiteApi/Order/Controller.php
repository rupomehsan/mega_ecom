<?php

namespace App\Modules\WebsiteApi\Order;

use App\Modules\WebsiteApi\Order\Actions\All;
use App\Modules\WebsiteApi\Order\Actions\Destroy;
use App\Modules\WebsiteApi\Order\Actions\Show;
use App\Modules\WebsiteApi\Order\Actions\EcommerceOrder;
use App\Modules\WebsiteApi\Order\Actions\Update;
use App\Modules\WebsiteApi\Order\Actions\SoftDelete;
use App\Modules\WebsiteApi\Order\Actions\Restore;
use App\Modules\WebsiteApi\Order\Actions\Import;
use App\Modules\WebsiteApi\Order\Validations\BulkActionsValidation;
use App\Modules\WebsiteApi\Order\Validations\GetAllValidation;
use App\Modules\WebsiteApi\Order\Validations\Validation;
use App\Modules\WebsiteApi\Order\Actions\BulkActions;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{



    public function EcommerceOrder(Validation $request)
    {
        $data = EcommerceOrder::execute($request);
        return $data;
    }

}
