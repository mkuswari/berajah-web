<?php

namespace App\Http\Controllers;

use App\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function enrollCourse($id)
    {
        $enroll = new Enrollment;
        $enroll->user_id = Auth::user()->id;
        $enroll->course_id = $id;
        $enroll->save();
        return redirect()->route("enroll-success");
    }

    public function  showEnrollSuuccessPage()
    {
        return view("main.enroll_success");
    }
}