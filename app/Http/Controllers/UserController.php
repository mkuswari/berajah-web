<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-users')) return $next($request);
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
        $users = User::paginate(10);
        return view("backend.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.create");
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
            "name" => "required|max:100",
            "email" => "required|max:100|email|unique:users,email",
            "password" => "required|string|min:8|confirmed",
            "password_confirmation" => "required|string|min:8",
        ]);

        $imgName = $request->avatar->getClientOriginalName() . '-' . time()
            . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('images/avatars/users'), $imgName);

        $user = new User;
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->email_verified_at = now();
        $user->phone = $request->get("phone");
        $user->roles = json_encode($request->get("roles"));
        $user->avatar = $imgName;
        $user->password = \Hash::make($request->get("password"));
        $user->save();
        return redirect()->route("users.index")->with("success", "User Baru berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("backend.users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("backend.users.edit", compact("user"));
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
            "name" => "required|string",
            "email" => "required|email"
        ]);



        $user = User::findOrFail($id);
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->phone = $request->get("phone");
        $user->roles = json_encode($request->get("roles"));
        if ($request->avatar) {
            $imgName = $request->avatar->getClientOriginalName() . '-' . time()
                . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/avatars/users'), $imgName);
            $user->avatar = $imgName;
        }
        $user->save();
        return redirect()->route("users.index")->with("success", "Data user berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("success", "User berhasil dihapus dari sistem");
    }
}
