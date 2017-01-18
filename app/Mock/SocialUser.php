<?php

namespace App\Mock;

use Laravel\Socialite\AbstractUser;

class SocialUser extends AbstractUser
{
    public $avatar_original;

    public function getAvatarOriginal()
    {
        return $this->avatar_original;
    }

}