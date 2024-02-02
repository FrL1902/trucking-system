<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //

    public function show_location_page(){
        $location = Location::all();

        return view('location', compact('location'));
    }

    public function add_new_location(Request $request)
    {
        // dd($request->location_id . $request->location_name . $request->location_address);
        $location = new Location();
        $location->location_id = $request->location_id;
        $location->lokasi = $request->location_name;
        $location->alamat = $request->location_address;
        $location->save();


        return redirect()->back();
    }

    public function edit_location(Request $request)
    {
        // dd($request->locationIdHidden . $request->location_name . $request->location_address);
        Location::where('location_id', $request->locationIdHidden)->update([
            'lokasi' => $request->location_name,
            'alamat' => $request->location_address,
        ]);

        return redirect()->back();
    }
}
