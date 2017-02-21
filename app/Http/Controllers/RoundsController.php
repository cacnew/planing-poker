<?php

namespace App\Http\Controllers;


use App\Services\RoundService;

class RoundsController extends EntityController
{
    public function __construct(RoundService $service)
    {
        parent::__construct($service);
    }
}
