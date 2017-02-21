<?php
namespace App\Services;

use App\Repositories\RoundRepository;
use App\Validators\RoundValidator;

class BaseRoundService extends BaseEntityService implements RoundService
{
    public function __construct(RoundRepository $repository, RoundValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

}