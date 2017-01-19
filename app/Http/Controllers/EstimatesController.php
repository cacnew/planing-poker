<?php

namespace App\Http\Controllers;

use App\Services\EstimateService;

class EstimatesController extends EntityController
{
    public function __construct(EstimateService $service)
    {
        parent::__construct($service);
    }

}
