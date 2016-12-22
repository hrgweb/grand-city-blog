<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
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

        $food = Food::create($request->all());

        return response()->json(['success' => true, 'food' => $food]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'data.name' => 'required|min:4',
            'data.description' => 'required|min:4'
        ], [
            'data.name.required' => 'Food is required',
            'data.name.min' => 'Food must have 4 characters',
            'data.description.required' => 'Description is required',
            'data.description.min' => 'Description must have 4 characters',
        ]);

        DB::table('foods')->where('id', $id)->update($request->all()['data']);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $result = DB::table('foods')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
