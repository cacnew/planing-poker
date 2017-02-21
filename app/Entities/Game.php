<?php

namespace App\Entities;

class Game extends BaseEntity
{
    protected $fillable = [
        'product_owner_id',
        'name',
        'cards',
        'start_at',
        'end_at',
    ];

    public function product_owner()
    {
        return $this->belongsTo(User::class);
    }

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }

}
