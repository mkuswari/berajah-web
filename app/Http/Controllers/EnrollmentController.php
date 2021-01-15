<?php

namespace App\Http\Controllers;

use App\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function newEnroll(Request $request)
    {
        $enroll = new Enrollment;
        $enroll->user_id = $request->get("user_id");
        $enroll->course_id = $request->get("course_id");
        $enroll->save();
        return "Enroll berhasil";
    }
}
