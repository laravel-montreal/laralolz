<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConferenceRequest;
use App\Managers\ConferenceManagerInterface;

class HomeController extends Controller
{
    public function index()
    {
        return view('atomic.pages.home');
    }
    public function loggedIn()
    {
        return view('atomic.pages.logged-in');
    }
}