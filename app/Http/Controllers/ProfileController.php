<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles == in_array("Admin", json_decode(Auth::user()->roles))) {
            return view("backend.profiles.index");
        } elseif (Auth::user()->roles == in_array("Staff", json_decode(Auth::user()->roles))) {
            return view("backend.profiles.index");
        } else {
            return view("frontend.profiles.index");
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "email" => "email"
        ]);



        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->phone = $request->get("phone");
        if ($request->avatar) {
            $imgName = $request->avatar->getClientOriginalName() . '-' . time()
                . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/avatars/users'), $imgName);
            $user->avatar = $imgName;
        }
        $user->save();
        return redirect()->route("profile-saya")->with("success", "Profile Has Been Updated Successfully");
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            "current_password" => "required|min:4",
            "new_password" => "required|min:4",
            "new_password_confirm" => "required|min:4"
        ]);

        // if current password not matches
        if (!(Hash::check($request->get("current_password"), Auth::user()->password))) {
            return redirect()->route("profile-saya")->with("error", "Password kamu salah");
        }

        // current password and new password are same
        if (strcmp($request->get("current_password"), $request->get("new_password")) == 0) {
            return redirect()->route("profile-saya")->with("error", "Password tidak boleh sama dengan sebelumnya");
        }

        // if password confirm not matches with new password
        if (!(strcmp($request->get("new_password"), $request->get("new_password_confirm"))) == 0) {
            return redirect()->route("profile-saya")->with("error", "Konfirmasi Password tidak sesuai");
        }

        // password has been accepted, now encrypt password using password Hash
        $user = User::findOrFail(Auth::user()->id);
        $user->password = \Hash::make($request->get("new_password"));
        $user->save();
        return redirect()->route("profile-saya")->with("success", "Password berhasil diganti");
    }
}
