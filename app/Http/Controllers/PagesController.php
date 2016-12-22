<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Location;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only('admin');
		$this->middleware('guest')->except('admin');
	}
	
	public function index()
	{
		$locations = Location::all();

		return view('pages.index', compact('locations'));
	}

	public function admin()
	{
		return view('pages.admin');
	}

	public function showLogin(Request $request)
	{
		return view('users.login');
	}
}
