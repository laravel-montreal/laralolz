<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConferenceRequest;
use App\Managers\ConferenceManagerInterface;

class OutingController extends Controller
{
    public function choose()
    {
        return view('atomic.pages.outing.choose');
    }
    public function create()
    {
        return view('atomic.pages.outing.create');
    }
    public function description()
    {
        return view('atomic.pages.outing.description');
    }
    public function own()
    {
        return view('atomic.pages.outing.own');
    }
}