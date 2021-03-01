<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-categories')) return $next($request);
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
        $categories = Category::paginate(10);
        return view("backend.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.categories.create");
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
            "name" => "required",
            "image" => "required|image"
        ]);

        $imgName = $request->image->getClientOriginalName() . '-' . time()
            . '.' . $request->image->extension();
        $request->image->move(public_path('images/thumbnails/categories'), $imgName);

        $category = new Category;
        $category->name = $request->get("name");
        $category->slug = \Str::slug($request->get("name"), "-");
        $category->image = $imgName;
        $category->save();
        return redirect()->route("categories.index")->with("success", "Kategori baru berhasil ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("backend.categories.edit", compact("category"));
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
            "name" => "required"
        ]);



        $category = Category::findOrFail($id);
        $category->name = $request->get("name");
        $category->slug = \Str::slug($request->get("slug"), "-");
        if ($request->image) {
            $imgName = $request->image->getClientOriginalName() . '-' . time()
                . '.' . $request->image->extension();
            $request->image->move(public_path('images/thumbnails/categories'), $imgName);
            $category->image = $imgName;
        }
        $category->save();
        return redirect()->route("categories.index")->with("success", "Data Kategori berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("categories.index")->with("success", "Data Kategori berhasil dihapus");
    }
}
