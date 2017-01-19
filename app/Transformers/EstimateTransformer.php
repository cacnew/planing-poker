<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Estimate;

/**
 * Class EstimateTransformer
 * @package namespace App\Transformers;
 */
class EstimateTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['owner'];

    /**
     * Transform the \Estimate entity
     * @param \Estimate $model
     *
     * @return array
     */
    public function transform(Estimate $model)
    {
        return [
            'id'         => (int) $model->id,
            'vote'       => $model->vote,
        ];
    }

    public function includeOwner(Estimate $model)
    {
        return $this->item($model->owner, new UserTransformer());
    }
}
