<?php

namespace App\Repositories;

use App\Presenters\EstimatePresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Estimate;
use App\Validators\EstimateValidator;

/**
 * Class EstimateRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EstimateRepositoryEloquent extends Repository implements EstimateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estimate::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EstimateValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
        return EstimatePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
