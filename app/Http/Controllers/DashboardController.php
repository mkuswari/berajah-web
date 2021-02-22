<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('dashboard')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $instructors = DB::table('instructors')->count();
        $courses = DB::table('courses')->count();
        $articles = DB::table('articles')->count();
        return view('backend.dashboard', compact('users', 'instructors', 'courses', 'articles'));
    }
}
