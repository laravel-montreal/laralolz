<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;

class HomeController extends Controller
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
    public function index()
    {
        return $this->viewFactory->make('atomic.pages.home');
    }
    public function loggedIn()
    {
        return $this->viewFactory->make('atomic.pages.logged-in');
    }
}