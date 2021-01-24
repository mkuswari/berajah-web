<?php

namespace App\Http\Controllers;

use App\Enrollment;
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
        $courseTaken = Enrollment::with("courses", "users")->get();
        return view('frontend.home', ["courses" => $courseTaken]);
    }
}
