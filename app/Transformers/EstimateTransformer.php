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
    protected $defaultIncludes = ['player', 'round'];

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
            'player_id'  => (int) $model->player_id,
            'round_id'   => (int) $model->round_id,
            'vote'       => $model->vote,
        ];
    }

    public function includePlayer(Estimate $model)
    {
        return $this->item($model->player, new UserTransformer());
    }

    public function includeRound(Estimate $model)
    {
        return $this->item($model->round, new RoundTransformer());
    }
}
