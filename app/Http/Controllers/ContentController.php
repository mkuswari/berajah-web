<?php

namespace App\Http\Controllers;

use App\Content;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-contents')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function addContent($id)
    {
        $course = Course::findOrFail($id);
        return view("backend.contents.create", compact("course"));
    }

    public function storeContent(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "video_id" => "required|url"
        ]);

        $content = new Content;
        $content->name = $request->get("name");
        $content->slug = \Str::slug($request->get("name"));
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->get("video_id"), $match);
        $youtubeVideoId = $match[1];
        $content->video_id = $youtubeVideoId;
        $content->instructor_note = $request->get("instructor_note");
        $content->course_id = $request->get("course_id");
        $content->save();
        return redirect()->route("courses.show", [$request->get("course_id")])->with("success", "Materi berhasil ditambahkan");
    }

    public function editContent($course_id, $id)
    {
        $course = Course::findOrFail($course_id);
        $content = Content::findOrFail($id);
        return view("backend.contents.edit", compact("course", "content"));
    }

    public function updateContent(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|string",
            "video_id" => "required|url"
        ]);

        $content = Content::findOrFail($id);
        $content->name = $request->get("name");
        $content->slug = \Str::slug($request->get("name"));
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->get("video_id"), $match);
        $youtubeVideoId = $match[1];
        $content->video_id = $youtubeVideoId;
        $content->instructor_note = $request->get("instructor_note");
        $content->course_id = $request->get("course_id");
        $content->save();
        return redirect()->route("courses.show", [$request->get("course_id")])->with("success", "Materi berhasil diperbarui");
    }

    public function deleteContent($course_id, $id)
    {
        $course = Course::findOrFail($course_id);
        $content = Content::findOrFail($id);
        $content->delete();
        return redirect()->route("courses.show", ["course" => $course])->with("success", "Materi berhasil dihapus");
    }
}
