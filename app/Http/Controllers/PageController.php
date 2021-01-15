<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;

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
        return view("main.course_catalogs", compact("courses"));
    }

    public function categoryCatalogs()
    {
        $categories = Category::paginate(16);
        return view("main.category_catalogs", compact("categories"));
    }

    public function blogCatalogs()
    {
        return view("main.blog_catalogs");
    }

    // Detail pages
    public function courseDetail($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $courses = Course::paginate(4);
        return view("main.course_detail", compact("course", "courses"));
    }

    public function categoryDetail($id)
    {
        $category = Category::findOrFail($id);
        $courses = Course::where('category_id', $id)->get();
        return view("main.category_detail", compact("category", "courses"));
    }
}
