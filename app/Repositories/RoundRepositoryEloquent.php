<?php

namespace App\Repositories;

use App\Presenters\RoundPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Round;
use App\Validators\RoundValidator;

/**
 * Class RoundRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RoundRepositoryEloquent extends Repository implements RoundRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Round::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RoundValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return mixed
     */
    public function presenter()
    {
        return RoundPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
