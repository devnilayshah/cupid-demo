<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use App\User;


class LoginController extends Controller
{
    //login form
	public function index(){
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

		return view('login.index');
	}


	//login function
	public function store(Request $request){
		try{

			$validate = $request->validate([
				'email_id' => 'required',
				'password' => 'required'
			]);

			$email = $request->get('email_id');
			$password = $request->get('password');
			$credentials = ['email'=>$email,'password'=>$password];

			if(Auth::attempt($credentials)){
				return redirect()->route('dashboard');
			}else{
				throw ValidationException::withMessages([
					'email_id' => [trans('auth.failed')],
				]);
			}

		}catch(QueryException $e){
			Log::error('Login function -'.$e);
			return redirect()->route('login')->with('error_msg',trans('messages.login.error'));
		}
	}

	//logout
	public function destroy(){
		Auth::logout();

        return redirect()->route('login')->with('success_msg',trans('messages.logout.success'));
	}
}
