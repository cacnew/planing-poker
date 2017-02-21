<?php

namespace App\Entities;

class Round extends BaseEntity
{
    protected $fillable = [
        'game_id',
        'name',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function estimates()
    {
        return $this->hasMany(Estimate::class);
    }

}
