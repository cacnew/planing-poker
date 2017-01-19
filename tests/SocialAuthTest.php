<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Socialite\Facades\Socialite;
use Faker\Factory as Faker;

class SocialAuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testFacebook() {
        $faker = Faker::create();

        $abstractUser = Mockery::mock('App\Mock\SocialUser');
        $abstractUser->id = 1234567890;
        $abstractUser->name = $faker->name;
        $abstractUser->email = $faker->email;
        $abstractUser->avatar_original = $faker->url;

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        $this->visit(route('auth.provider.callback', ['facebook']))
            ->seePageIs(route("home"));
    }

    public function testGoogle() {
        $faker = Faker::create();

        $abstractUser = Mockery::mock('App\Mock\SocialUser');
        $abstractUser->id = 1234567890;
        $abstractUser->name = $faker->name;
        $abstractUser->email = $faker->email;
        $abstractUser->avatar_original = $faker->url;

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $this->visit(route('auth.provider.callback', ['google']))
            ->seePageIs(route("home"));
    }
}