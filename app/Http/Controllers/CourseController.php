<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view("backend.courses.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $instructors = Instructor::all();
        return view("backend.courses.create", compact("categories", "instructors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course;
        $course->name = $request->get("name");
        $course->slug = \Str::slug($request->get("name"));
        if ($request->file("thumbnail")) {
            $fileUpload = $request->file("thumbnail")->store("course_thumbnails", "public");
            $course->thumbnail = $fileUpload;
        }
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->get("trailer_url"), $match);
        $youtubeVideoId = $match[1];
        $course->trailer_url = $youtubeVideoId;
        // $course->trailer_url = $request->get("trailer_url");
        $course->description = $request->get("description");
        $course->level = $request->get("level");
        $course->type = $request->get("type");
        $course->price = $request->get("price");
        $course->prerequisite = $request->get("prerequisite");
        $course->category_id = $request->get("category_id");
        $course->instructor_id = $request->get("instructor_id");
        $course->status = $request->get("status");
        $course->save();
        return redirect()->route("courses.index")->with("success", "Kelas baru berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view("backend.courses.show", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();
        $instructors = Instructor::all();
        return view("backend.courses.edit", compact("course", "categories", "instructors"));
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
        $course = Course::findOrFail($id);
        $course->name = $request->get("name");
        $course->slug = \Str::slug($request->get("name"));
        if ($request->file("thumbnail")) {
            if ($course->thumbnail && file_exists(storage_path("app/public/" . $course->name))) {
                \Storage::delete("public/" . $course->thumbnail);
            }
            $newThumbnail = $request->file("image")->store("course_thumbnails", "public");
            $course->image = $newThumbnail;
        }
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->get("trailer_url"), $match);
        $youtubeVideoId = $match[1];
        $course->trailer_url = $youtubeVideoId;
        $course->description = $request->get("description");
        $course->level = $request->get("level");
        $course->type = $request->get("type");
        $course->price = $request->get("price");
        $course->prerequisite = $request->get("prerequisite");
        $course->category_id = $request->get("category_id");
        $course->instructor_id = $request->get("instructor_id");
        $course->status = $request->get("status");
        $course->save();
        return redirect()->route("courses.index")->with("success", "Kelas berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route("courses.index")->with("success", "Kelas berhasil Dihapus");
    }
}
