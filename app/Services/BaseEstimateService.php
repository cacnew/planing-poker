<?php

namespace App\Services;

use App\Repositories\EstimateRepository;
use App\Validators\EstimateValidator;

class BaseEstimateService extends BaseEntityService implements EstimateService
{
    public function __construct(EstimateRepository $repository, EstimateValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

}