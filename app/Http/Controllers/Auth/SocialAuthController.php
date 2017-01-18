<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Services\UserService;
use Auth;
use Socialite;

class SocialAuthController
{
    protected $redirectPath = '/home';

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('auth/'.$provider);
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect()->route('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $providerUser
     * @return User
     */
    private function findOrCreateUser($providerUser, $provider)
    {
        $authUser = $this->userService->skipPresenter()
            ->updateOrCreate(
                [
                    [$provider.'_id','=', $providerUser->id],
                    ['email', '=',$providerUser->email,'OR'],
                ],
                [
                    'name' => $providerUser->name,
                    'email' => $providerUser->email,
                    $provider.'_id' => $providerUser->id,
                    'avatar' => $providerUser->avatar_original,
                ]
            )->first();
        return $authUser;
    }
}