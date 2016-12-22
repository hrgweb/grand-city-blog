<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.location');
    }

    public function getLocationRecords()
    {
        $locations = Location::all();

        return response()->json(['locations' => $locations]);
    }

    public function store(Request $request)
    {
        // return response()->json([$request->all()]);

    	$this->validate($request, [
            'location' => 'required|min:4',
            'title' => 'required|min:4'
        ]);

        $location = new Location;
        $result = $location->toInsert($request);

        return response()->json(['success' => true, 'location' => $result]);
    }

    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'location' => 'required|min:4',
            'title' => 'required|min:4'
        ]);

        $location->toUpdate($request, $location);

        return response()->json(['success' => true, 'result' => $request->all()]);
    }

    public function destroy($id)
    {
        $result = DB::table('locations')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
