<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class socialLoginController extends Controller
{
    //redirect login
    public function redirect($provider){ //provider => google->github->url

        return Socialite::driver($provider)->redirect();

    }

    //callback Url
    public function callback($provider){

        $socialUser = Socialite::driver($provider)->user();

        //create or update data from google/github login to users table
        $user = User::updateOrCreate([
            'provider_id' => $socialUser->id,
        ], [
            'name' => $socialUser->name,
            'nickname' => $socialUser->nickname,
            'email' => $socialUser->email,
            'provider_token' => $socialUser->token,
            'role' => 'user',
            'provider' => $provider
        ]);

        Auth::login($user);

        return to_route('userHome');
    }
}
