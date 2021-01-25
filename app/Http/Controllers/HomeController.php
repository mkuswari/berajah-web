<?php

namespace App\Http\Controllers;

use App\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $enrollments = Enrollment::with("courses")->where("user_id", Auth::user()->id)->paginate(10);

        return view('frontend.home', compact("enrollments"));
    }
}
