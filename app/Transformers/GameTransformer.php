<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Game;

/**
 * Class GameTransformer
 * @package namespace App\Transformers;
 */
class GameTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['product_owner'];

    /**
     * Transform the \Game entity
     * @param \Game $model
     *
     * @return array
     */
    public function transform(Game $model)
    {
        return [
            'id'                => (int) $model->id,
            'product_owner_id'  => (int) $model->product_owner_id,
            'name'              => $model->name,
            'cards'             => $model->cards,
            'start_at'          => $model->start_at,
            'end_at'            => $model->end_at,
            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }

    public function includeProductOwner(Game $model)
    {
        return $this->item($model->product_owner, new UserTransformer());
    }
}
