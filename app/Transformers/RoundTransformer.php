<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Round;

/**
 * Class RoundTransformer
 * @package namespace App\Transformers;
 */
class RoundTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['game'];
    /**
     * Transform the \Round entity
     * @param \Round $model
     *
     * @return array
     */
    public function transform(Round $model)
    {
        return [
            'id'         => (int) $model->id,
            'game_id'         => (int) $model->game_id,
            'name'       => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeGame(Round $model)
    {
        return $this->item($model->game, new GameTransformer());
    }
}
