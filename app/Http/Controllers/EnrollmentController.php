<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enrollment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-enrollments')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = Enrollment::with("users", "courses")->paginate(10);
        return view("backend.enrollments.index", compact("enrollments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view("backend.enrollments.create", compact("users", "courses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "user_id" => "required",
            "course_id" => "required"
        ]);

        $enroll = new Enrollment;
        $enroll->user_id = $request->get("user_id");
        $enroll->course_id = $request->get("course_id");
        $enroll->status = "On Progress";
        $enroll->save();
        return redirect()->route("enrolls.index")->with("success", "Data Enroll Kelas baru berhasil ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $courses = Course::all();
        $enroll = Enrollment::findOrFail($id);
        return view("backend.enrollments.edit", compact("users", "courses", "enroll"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "user_id" => "required",
            "course_id" => "required"
        ]);

        $enroll = Enrollment::findOrFail($id);
        $enroll->user_id = $request->get("user_id");
        $enroll->course_id = $request->get("course_id");
        $enroll->status = $request->get("status");
        $enroll->save();
        return redirect()->route("enrolls.index")->with("success", "Data Enroll berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enroll = Enrollment::findOrFail($id);
        $enroll->delete();
        return redirect()->route("enrolls.index")->with("success", "Enroll kelas berhasil dihapus");
    }
}
