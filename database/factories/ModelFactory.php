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
        'slug' => 'chez-pare',
        'title' => 'Chez Paré',
        'subtitle' => 'ou la Maison du Père Noël',
        'description' => 'Bar de bon goût à prix compétitifs, très compétitifs',
        'address1' => '1, place Ville-Marie',
        'address2' => '',
        'address3' => '',
        'city' => 'Montréal',
        'state' => 'QC',
        'country' => 'Canada',
        'postal_code' => 'H0H 0H0',
        'phone' => '555-696-9696',
        'url' => 'www.chez-pare.com',
        'email' => 'pare@chez-pare.com',
    ];
});

$factory->define('App\Outing', function ($faker) {
    return [
        'slug' => 'le-sapin-a-des-boules',
        'title' => 'Le Sapin a des boules',
        'subtitle' => 'sous-titre suggestif',
        'description' => 'Party de Noël avec beaucoup de plaisir',
        'starts_at' => '2015-12-24 19:00:00',
        'ends_at' => '2015-12-25 03:00:00',
    ];
});

$factory->define('App\Conference', function ($faker) {
    return [
        'slug' => 'laracon-chez-pare',
        'title' => 'Laracon Chez Paré',
        'subtitle' => 'Taylor va être content',
        'description' => 'Codes et boules chez Paré',
        'starts_at' => '2015-12-21 19:00:00',
        'ends_at' => '2015-12-25 03:00:00',
        'address1' => '1, place Ville-Marie',
        'address2' => '',
        'address3' => '',
        'city' => 'Montréal',
        'state' => 'QC',
        'country' => 'Canada',
        'postal_code' => 'H0H 0H0',
        'phone' => '555-696-9696',
        'url' => 'www.chez-pare.com',
        'email' => 'pare@chez-pare.com',
    ];
});
