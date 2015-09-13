<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConferenceRequest;
use App\Managers\ConferenceManagerInterface;

class ConferenceController extends Controller
{
    protected $conferenceManager;

    /**
     * @param ConferenceManagerInterface $conferenceManager
     * @param OutingManagerInterface $outingManager
     */
    public function __construct(ConferenceManagerInterface $conferenceManager,
    OutingManagerInterface $outingManager)
    {
        $this->conferenceManager = $conferenceManager;
        $this->outingManager = $outingManager;
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
    
    /**
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $slug)
    {
        $conference = $this->conferenceManager->getBySlug($slug);
        if (is_null($conference)) {
            return view('errors.404');
        }
        
        $outings = $this->outingManager->getUpcomingForConference($conference);
        return view('conferences.show', compact('outings'));
    }
}
