<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;

class OutingController extends Controller
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
    public function choose()
    {
        return $this->viewFactory->make('atomic.pages.outing.choose');
    }
    public function create()
    {
        return $this->viewFactory->make('atomic.pages.outing.create');
    }
    public function description()
    {
        return $this->viewFactory->make('atomic.pages.outing.description');
    }
    public function own()
    {
        return $this->viewFactory->make('atomic.pages.outing.own');
    }
}