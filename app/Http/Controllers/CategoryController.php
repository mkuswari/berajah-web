<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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

        $category = new Category;
        $category->name = $request->get("name");
        $category->slug = \Str::slug($request->get("name"), "-");
        if ($request->file("image")) {
            $fileUpload = $request->file("image")->store("category_images", "public");
            $category->image = $fileUpload;
        }
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
        if ($request->file("image")) {
            if ($category->image && file_exists(storage_path("app/public/" . $category->name))) {
                \Storage::delete("public/" . $category->image);
            }
            $newImage = $request->file("image")->store("category_images", "public");
            $category->image = $newImage;
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
