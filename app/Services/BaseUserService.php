<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class BaseUserService extends BaseEntityService implements UserService
{
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}