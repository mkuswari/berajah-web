<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        if (Auth::user()->roles == json_encode('ad')) {
            # code...
        } else {
            # code...
        }
    }

    public function updateProfile()
    {
        // todo
    }

    public function changePassword()
    {
        //
    }
}
