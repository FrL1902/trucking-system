<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function show_inactiveItem_page(){
        return view('inactiveItem');
    }
}
