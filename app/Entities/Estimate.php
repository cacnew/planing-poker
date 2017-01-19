<?php

namespace App\Entities;

class Estimate extends BaseEntity
{

    protected $fillable = [
        'owner_id',
        'vote'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

}
