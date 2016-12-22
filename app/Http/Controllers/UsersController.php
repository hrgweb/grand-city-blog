<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UsersController extends Controller
{
	public function login(Request $request)
	{
		return $request->all();
	}

	public function signin(Request $request)
	{
		$credentials = [
			'username' => $request->username,
			'password' => $request->password
		];

		if (Auth::attempt($credentials)) {
			return redirect('admin');
		}

		return back()
				->withInput($request->only('username'))
				->withErrors([ 'errors' => Lang::get('auth.failed') ]);
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}
}
