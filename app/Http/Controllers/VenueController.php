<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConferenceRequest;
use App\Managers\ConferenceManagerInterface;

class VenueController extends Controller
{
    public function search()
    {
        return view('atomic.pages.venue.search');
    }
}