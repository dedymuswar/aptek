<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('page/home');
    }

    public function gillies()
    {
        return view('page.gillies');
    }

    public function doughlas()
    {
        return view('page.doughlas');
    }

    public function ilyas()
    {
        return view('page.ilyas');
    }

    public function ppni()
    {
        return view('page.ppni');
    }

    public function depkes()
    {
        return view('page.depkes');
    }
}
