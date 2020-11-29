<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class GoogleController extends Controller
{
	public function redirectToProvider()
	{
		return Socialite::driver('google')->redirect();
	}

	public function handleProviderCallback()
	{
		$googleUser = Socialite::driver('google')->user();
		$user = User::where('email',$googleUser->email)->first();

        if(!is_null($user)){
             Auth::login($user);

             return redirect()->route('dashboard');
        }else{
            return redirect()->route('register',['email'=>$googleUser->email,'id'=>$googleUser->id]);
        }
    }

}
