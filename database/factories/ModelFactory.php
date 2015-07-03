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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define('App\Venue', function ($faker) {
    return [
        'slug' => $faker->unique()->slug,
        'title' => $faker->sentence(3),
        'subtitle' => $faker->sentence(5),
        'description' => $faker->text,
        'address1' => $faker->streetAddress,
        'address2' => '',
        'address3' => '',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'country' => 'Canada',
        'postal_code' => 'H0H 0H0',
        'phone' => $faker->phoneNumber,
        'url' => $faker->url,
        'email' => $faker->email,
    ];
});

$factory->define('App\Outing', function ($faker) {
    return [
        'slug' => $faker->unique()->slug,
        'title' => $faker->sentence(3),
        'subtitle' => $faker->sentence(5),
        'description' => $faker->text,
        'starts_at' => '2015-12-24 19:00:00',
        'ends_at' => '2015-12-25 03:00:00',
    ];
});

$factory->define('App\Conference', function ($faker) {
    return [
        'slug' => $faker->unique()->slug,
        'title' => $faker->sentence(3),
        'subtitle' => $faker->sentence(5),
        'description' => $faker->text,
        'starts_at' => '2015-12-21 19:00:00',
        'ends_at' => '2015-12-25 03:00:00',
        'address1' => $faker->streetAddress,
        'address2' => '',
        'address3' => '',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'country' => 'Canada',
        'postal_code' => 'H0H 0H0',
        'phone' => $faker->phoneNumber,
        'url' => $faker->url,
        'email' => $faker->email,
    ];
});
