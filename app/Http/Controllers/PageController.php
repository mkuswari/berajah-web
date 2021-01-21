<?php

namespace App\Http\Controllers;

use App\Article;
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
        $articles = Article::paginate(4);
        return view("landing", compact("courses", "articles"));
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
        $enroll = Enrollment::where("course_id", $course->id)->first();


        return view("pages.course_detail", compact("course", "courses", "contents", "enroll"));
    }

    public function categoryDetail($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $courses = Course::where('category_id', $category->id)->get();
        return view("pages.category_detail", compact("category", "courses"));
    }
}
