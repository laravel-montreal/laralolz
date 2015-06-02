<?php namespace App\Commands;

use App\Commands\Command;
use App\Conference;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateConference extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Conference $conference)
	{
		$this->conference = $conference;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		// todo: validation
	}

}
