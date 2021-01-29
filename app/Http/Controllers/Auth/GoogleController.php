<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\User;

class GoogleController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {

            $user = Socialite::driver($provider)->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->route("home");
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => now(),
                    'google_id' => $user->id,
                    'password' => encrypt('googleauth')
                ]);

                Auth::login($newUser);

                return redirect()->route("home");
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
