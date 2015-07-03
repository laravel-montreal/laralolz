<?php

namespace app\Jobs;

use App\Conference;
use App\Http\Requests\CreateConferenceRequest;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateConference extends Job implements SelfHandling
{
    /**
     * @var Conference
     */
    private $conference;
    /**
     * @var CreateConferenceRequest
     */
    private $conferenceData;

    /**
     * Create a new job instance.
     */
    public function __construct(CreateConferenceRequest $conferenceData)
    {
        $this->conferenceData = $conferenceData;
    }

    /**
     * Execute the job.
     */
    public function handle(Conference $conference)
    {
        // TODO: Implement actual logic. Add venue, Send confirmation email, tweet about it, notify followers, etc...
        // The Conference Model has now been injected
        return "Conference {$this->conferenceData->title} created !";
    }
}
