<?php

namespace App\Services;


use App\Repositories\GameRepository;
use App\Validators\GameValidator;

class BaseGameService extends BaseEntityService implements GameService
{
    public function __construct(GameRepository $repository, GameValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

}