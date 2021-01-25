<?php

namespace App\Http\Controllers;

use App\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::paginate(10);
        return view("backend.instructors.index", compact("instructors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.instructors.create");
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
            "name" => "required|string|max:100",
            "job" => "required|string",
            "expertise" => "required|string",
            "email" => "required|string|email",
            "about" => "required",
        ]);

        $instructor = new Instructor;
        $instructor->name = $request->get("name");
        $instructor->job = $request->get("job");
        $instructor->expertise = $request->get("expertise");
        $instructor->email = $request->get("email");
        $instructor->about = $request->get("about");
        if ($request->file("avatar")) {
            $fileUpload = $request->file("avatar")->store("avatars", "public");
            $instructor->avatar = $fileUpload;
        }
        $instructor->save();
        return redirect()->route("instructors.index")->with("success", "Instruktur Baru berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view("backend.instructors.show", compact("instructor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view("backend.instructors.edit", compact("instructor"));
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
            "name" => "required|string|max:100",
            "job" => "required|string",
            "expertise" => "required|string",
            "email" => "required|string|email",
            "about" => "required",
        ]);

        $instructor = Instructor::findOrFail($id);
        $instructor->name = $request->get("name");
        $instructor->job = $request->get("job");
        $instructor->expertise = $request->get("expertise");
        $instructor->email = $request->get("email");
        $instructor->about = $request->get("about");
        if ($request->file("avatar")) {
            if ($instructor->avatar && file_exists(storage_path("app/public/" . $instructor->avatar))) {
                \Storage::delete("public/" . $instructor->avatar);
            }
            $fileUpload = $request->file("avatar")->store("avatars", "public");
            $instructor->avatar = $fileUpload;
        }
        $instructor->save();
        return redirect()->route("instructors.index")->with("success", "Data Instruktur berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();
        return redirect()->route("instructors.index")->with("success", "Data Instruktur berhasil dihapus dari sistem");
    }
}
