<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function show_activeItem_page(){
        $barangKeluar = BarangKeluar::all();
        return view('activeItem', compact('barangKeluar'));
    }

    public function view_detail_keluar($id){
        $detail = BarangKeluar::find($id);
        return view('barangkeluardetail', compact('detail'));
    }
}
