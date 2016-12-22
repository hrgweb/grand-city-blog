<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $tour = new Tour;
        $result = $tour->toInsert($request);

        return response()->json(['success' => true, 'tour' => $result]);
	}

	public function update(Request $request, Tour $tour)
    {
        $this->validate($request, [
            'place' => 'required|min:4',
            'description' => 'required|min:4'
        ]);

        $result = $tour->toUpdate($request, $tour);

        return response()->json(['success' => true, 'result' => $request->all()]);
    }

    public function destroy($id)
    {
        $result = DB::table('tours')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
