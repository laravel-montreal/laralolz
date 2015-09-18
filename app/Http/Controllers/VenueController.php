<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;

class VenueController extends Controller
{
    /**
     * @var Factory
     */
    private $viewFactory;

    /**
     * @param Factory $viewFactory
     */
    public function __construct(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }
    public function search()
    {
        return $this->viewFactory->make('atomic.pages.venue.search');
    }
}