<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function show_activeItem_page(){
        return view('activeItem');
    }
}
