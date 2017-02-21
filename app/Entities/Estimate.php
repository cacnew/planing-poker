<?php

namespace App\Entities;

class Estimate extends BaseEntity
{

    protected $fillable = [
        'player_id',
        'round_id',
        'vote'
    ];

    public function player()
    {
        return $this->belongsTo(User::class);
    }

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

}
