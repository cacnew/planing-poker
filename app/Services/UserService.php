<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class UserService extends EntityService
{
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}