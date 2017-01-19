<?php

namespace App\Presenters;

use App\Transformers\EstimateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EstimatePresenter
 *
 * @package namespace App\Presenters;
 */
class EstimatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EstimateTransformer();
    }
}
