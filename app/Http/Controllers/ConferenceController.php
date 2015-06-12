<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConferenceRequest;
use App\Repositories\ConferenceRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConferenceController extends Controller
{
    protected $conferenceRepository;

    /**
     * @param ConferenceRepositoryInterface $conferenceRepository
     */
    public function __construct(ConferenceRepositoryInterface $conferenceRepository)
    {
        $this->conferenceRepository = $conferenceRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $conferences = $this->conferenceRepository->getUpcomming();

        return view('conferences.index', compact('conferences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateConferenceRequest $request)
    {
        $conference = $this->conferenceRepository->create($request);

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
