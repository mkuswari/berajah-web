<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-articles')) return $next($request);
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
        $articles = Article::all();
        return view("backend.articles.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("backend.articles.create", compact("categories"));
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
            "title" => "required",
            "thumbnail" => "required|image",
            "category_id" => "required",
            "content" => "required",
        ]);

        $article = new Article;
        $article->title = $request->get("title");
        $article->slug = \Str::slug($request->get("title"));
        if ($request->file("thumbnail")) {
            $fileUpload = $request->file("thumbnail")->store("article_thumbnails", "public");
            $article->thumbnail = $fileUpload;
        }
        $article->author = Auth::user()->name;
        $article->content = $request->get("content");
        $article->category_id = $request->get("category_id");
        $article->status = $request->get("status");
        $article->save();
        return redirect()->route("articles.index")->with("success", "Artikel baru berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view("backend.articles.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view("backend.articles.edit", compact("article", "categories"));
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
            "title" => "required",
            "category_id" => "required",
            "content" => "required",
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->get("title");
        $article->slug = \Str::slug($request->get("title"));
        if ($request->file("thumbnail")) {
            if ($article->thumbnail && file_exists(storage_path("app/public/" . $article->name))) {
                \Storage::delete("public/" . $article->thumbnail);
            }
            $newthumbnail = $request->file("thumbnail")->store("article_thumbnails", "public");
            $article->thumbnail = $newthumbnail;
        }
        $article->author = Auth::user()->name;
        $article->content = $request->get("content");
        $article->category_id = $request->get("category_id");
        $article->status = $request->get("status");
        $article->save();
        return redirect()->route("articles.index")->with("success", "Artikel berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route("articles.index")->withCookie("success", "Artikel berhasil dihapus");
    }
}
