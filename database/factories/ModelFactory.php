<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'facebook_id' => $faker->unique()->randomNumber(5),
        'google_id' => $faker->unique()->randomNumber(5),
        'avatar' => $faker->imageUrl,
    ];
});

$factory->define(App\Entities\Game::class, function (Faker\Generator $faker) {
    $cards = Config::get('cards.types');
    $product_owner = factory(App\Entities\User::class)->create();
    return [
        'product_owner_id' => $product_owner->id,
        'name' => $faker->word,
        'cards' => $cards[array_rand($cards)],
        'start_at' => $faker->dateTime,
        'end_at' => $faker->dateTime,
    ];
});

$factory->define(App\Entities\Round::class, function (Faker\Generator $faker) {
    $game = factory(App\Entities\Game::class)->create();
    return [
        'game_id' => $game->id,
        'name' => $faker->word,
    ];
});

$factory->define(App\Entities\Estimate::class, function (Faker\Generator $faker) {
    $player = factory(App\Entities\User::class)->create();
    $round = factory(App\Entities\Round::class)->create();
    $cards = Config::get('cards.'.$round->game->cards);
    return [
        'player_id' => $player->id,
        'round_id' => $round->id,
        'vote' => $cards[array_rand($cards)]
    ];
});
