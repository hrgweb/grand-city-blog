<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getFoodRecords()
	{
		$foods = Food::all();

		return response()->json(['foods' => $foods]);
	}

	public function index()
	{
		return view('pages.food');
	}

	public function store(Request $request)
    {
        // return response()->json([$request->all()]);

    	$this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required|min:4'
        ]);

        $food = new Food;
        $result = $food->toInsert($request);

        return response()->json(['success' => true, 'food' => $result]);
    }

    public function update(Request $request, Food $food)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required|min:4'
        ]);

        $result = $food->toUpdate($request, $food);

        return response()->json(['success' => true, 'result' => $request->all()]);
    }

    public function destroy($id)
    {
        $result = DB::table('foods')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
