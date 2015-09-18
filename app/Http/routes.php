<?php

/*
 * NOTES
 *
 * Currently this route file contains only static routes that link to the page template views.
 * This is setup this way to start structuring our designs, but will change once the rest is in place.
 *
 * The final routes will not call the views directly, but will go through controllers, once those are ready.
 *
 * Also the template views will not be called directly, but rather the pages views.
 * See http://patternlab.io/ to learn about the Atomic Design approach we're implementing.
 *
 *                                                        -- Your friendly neighborhood front-end team
 */

Route::resource('/', 'ConferenceController');

/**
 *  Home routes
 */

Route::get('/home', 'HomeController@index');

// Note: The logged in page will be accessible from the '/' route when user is authenticated.
// This should be done in a future commit.

Route::get('/logged-in', 'HomeController@loggedIn');

/**
 * Outing routes
 */

Route::get('/outing/choose', 'OutingController@choose');

Route::get('/outing/create', 'OutingController@create');

Route::get('/outing/description', 'OutingController@description');

Route::get('/outing/own', 'OutingController@own');

/**
 * Venue routes
 */

Route::get('/venue/search', 'VenueController@search');

/**
 * Twitter login/logout routes
 */
Route::get('twitter/login', 'AuthController@login');

Route::get('logout', 'AuthController@logout');

// test protected route
Route::get('profile', ['middleware' => 'auth', function () {
    return '<img src="' . Auth::user()->avatar . '"/> ';
}]);
