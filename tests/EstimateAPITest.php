<?php

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Faker\Factory as Faker;

class EstimateAPITest extends EntityAPITest
{

    protected function setUp()
    {
        if (! $this->app) {
            $this->refreshApplication();
        }
        $faker = Faker::create();

        $abstractUser = Mockery::mock('App\Mock\SocialUser');
        $abstractUser->id = 1234567890;
        $abstractUser->name = $faker->name;
        $abstractUser->email = $faker->email;
        $abstractUser->avatar_original = $faker->url;

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $this->visit(route('auth.provider.callback', ['google']));

        $user = Auth::user();
        $cards = Config::get('cards.standard');
        $this->entityData = [
            'vote' => $cards[array_rand($cards)],
            'owner_id' => $user->id,
        ];
        $this->uri = 'api/estimate/';
        parent::setUp();
    }
}