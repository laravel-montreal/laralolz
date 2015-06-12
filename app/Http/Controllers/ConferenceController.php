<?php
namespace App\Http\Controllers;

use App\Repositories\ConferenceRepositoryInterface;

class ConferenceController extends Controller
{
    public function __construct(ConferenceRepositoryInterface $conferenceRepository)
    {
        $this->conferenceRepository = $conferenceRepository;
    }
}