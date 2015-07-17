<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConferenceRequest;
use App\Managers\ConferenceManagerInterface;

class ConferenceController extends Controller
{
    protected $conferenceManager;

    /**
     * @param ConferenceRepositoryInterface $conferenceRepository
     */
    public function __construct(ConferenceManagerInterface $conferenceManager)
    {
        $this->conferenceManager = $conferenceManager;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $conferences = $this->conferenceManager->getUpcoming();

        return view('conferences.index', compact('conferences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateConferenceRequest $request)
    {
        $conference = $this->conferenceManager->create($request);

        echo $conference;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create()
    {
        return view('conferences.create');
    }
}
