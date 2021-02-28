<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Content;
use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $courses = Course::where("status", "Published")->paginate(4);
        $articles = Article::paginate(4);
        return view("landing", compact("courses", "articles"));
    }

    public function courseCatalogs(Request $request)
    {
        $courses = Course::where("status", "Published")->paginate(16);
        $filterKeyword = $request->get("keyword");
        if ($filterKeyword) {
            $courses =  Course::where("name", "LIKE", "%$filterKeyword%")->paginate(16);
        }
        return view("pages.course_catalogs", compact("courses"));
    }

    public function categoryCatalogs(Request $request)
    {
        $categories = Category::paginate(16);
        $filterKeyword = $request->get("keyword");
        if ($filterKeyword) {
            $categories =  Category::where("name", "LIKE", "%$filterKeyword%")->paginate(16);
        }
        return view("pages.category_catalogs", compact("categories"));
    }

    public function blogCatalogs(Request $request)
    {
        $articles = Article::paginate(10);
        $filterKeyword = $request->get("keyword");
        if ($filterKeyword) {
            $articles =  Article::where("title", "LIKE", "%$filterKeyword%")->paginate(16);
        }
        return view("pages.blog_catalogs", compact("articles"));
    }

    public function paymentPageAction()
    {
        abort(404);
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
        $courses = Course::where('category_id', $category->id)->paginate(16);
        return view("pages.category_detail", compact("category", "courses"));
    }

    public function blogDetail($slug)
    {
        $article = Article::where("slug", $slug)->first();
        $articles = Article::all();
        return view("pages.blog_detail", compact("article", "articles"));
    }
}
