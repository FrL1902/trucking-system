<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\CategoryStock;
use App\Models\Location;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show_drivers_page(){

        return view('driver');
    }
}
