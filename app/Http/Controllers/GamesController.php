<?php

namespace App\Http\Controllers;


use App\Services\GameService;

class GamesController extends EntityController
{
    public function __construct(GameService $service)
    {
        parent::__construct($service);
    }
}
