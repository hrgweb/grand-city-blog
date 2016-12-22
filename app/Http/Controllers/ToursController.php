<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getTourRecords()
	{
		$tours = Tour::all();

        return response()->json(['tours' => $tours]);
	}

	public function index()
	{
		return view('pages.tour');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'place' => 'required|min:4',
            'description' => 'required|min:4'
        ]);

        $tour = Tour::create($request->all());

        return response()->json(['success' => true, 'tour' => $tour]);
	}

	public function update(Request $request, $id)
    {
        $this->validate($request, [
            'data.place' => 'required|min:4',
            'data.description' => 'required|min:4'
        ], [
            'data.place.required' => 'Tour is required',
            'data.place.min' => 'Tour must have 4 characters',
            'data.description.required' => 'Description is required',
            'data.description.min' => 'Description must have 4 characters',
        ]);

        DB::table('tours')->where('id', $id)->update($request->all()['data']);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $result = DB::table('tours')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
