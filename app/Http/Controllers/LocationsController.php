<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
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
        return response()->json([$request->all()]);

    	$this->validate($request, [
            'location' => 'required|min:4',
            'title' => 'required|min:4'
        ]);

        $location = Location::create($request->all());

        return response()->json(['success' => true, 'location' => $location]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'data.location' => 'required|min:4',
            'data.title' => 'required|min:4'
        ], [
            'data.location.required' => 'Location is required',
            'data.location.min' => 'Location must have 4 characters',
            'data.title.required' => 'Title is required',
            'data.title.min' => 'Title must have 4 characters',
        ]);

        DB::table('locations')->where('id', $id)->update($request->all()['data']);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $result = DB::table('locations')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
