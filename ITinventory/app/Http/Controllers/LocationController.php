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
}
