<?php

namespace App\Presenters;

use App\Transformers\RoundTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoundPresenter
 *
 * @package namespace App\Presenters;
 */
class RoundPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoundTransformer();
    }
}
