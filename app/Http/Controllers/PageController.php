<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(4);
        return view("landing", compact("courses"));
    }

    public function courseCatalogs()
    {
        $courses = Course::paginate(16);
        return view("pages.course_catalogs", compact("courses"));
    }

    public function categoryCatalogs()
    {
        $categories = Category::paginate(16);
        return view("pages.category_catalogs", compact("categories"));
    }

    public function blogCatalogs()
    {
        return view("pages.blog_catalogs");
    }

    // Detail pages
    public function courseDetail($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $courses = Course::paginate(4);
        $contents = Content::where("course_id", $course->id)->get();
        $enroll = Enrollment::all();

        // if (Auth::user()->id) {
        //     if ($enroll->user_id == Auth::user()->id && $enroll->course_id == $course->id) {

        //     }
        // }

        // $enroll = Enrollment::where("course_id", $course->id)->get();
        return view("pages.course_detail", compact("course", "courses", "contents", "enroll"));
    }

    public function categoryDetail($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $courses = Course::where('category_id', $category->id)->get();
        return view("pages.category_detail", compact("category", "courses"));
    }
}
