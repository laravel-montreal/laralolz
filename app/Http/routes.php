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


/**
 *  Home routes
 */

Route::get('/', function () {
    return view('welcome');
});

// Note: The logged in page will be accessible from the '/' route when user is authenticated.
// This should be done in a future commit.
Route::get('/logged-in', function () {
    return view('atomic.template.logged-in');
});

/**
 * Outing routes
 */

Route::get('/outing/choose', function () {
    return view('atomic.template.outing.choose');
});

Route::get('/outing/create', function () {
    return view('atomic.template.outing.create');
});

Route::get('/outing/description', function () {
    return view('atomic.template.outing.description');
});

Route::get('/outing/own', function () {
    return view('atomic.template.outing.own');
});

/**
 * Search route
 */

Route::get('/search', function () {
    return view('atomic.template.outing.own');
});

