<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Content;
use App\Course;
use App\Enrollment;

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
        $articles = Article::paginate(10);
        return view("pages.blog_catalogs", compact("articles"));
    }

    // Detail pages
    public function courseDetail($slug)
    {
        $course = Course::where("slug", $slug)->first();
        $courses = Course::paginate(4);
        $contents = Content::where("course_id", $course->id)->get();
        $enroll = Enrollment::where("course_id", $course->id)->first();

        // dd($course->type);
        return view("pages.course_detail", compact("course", "courses", "contents", "enroll"));
    }

    public function categoryDetail($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $courses = Course::where('category_id', $category->id)->get();
        return view("pages.category_detail", compact("category", "courses"));
    }

    public function blogDetail($slug)
    {
        $article = Article::where("slug", $slug)->first();
        return view("pages.blog_detail", compact("article"));
    }
}
