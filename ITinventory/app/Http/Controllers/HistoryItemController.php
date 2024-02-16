<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryItemController extends Controller
{
    public function show_historyItem_page(){
        $history = History::all();

        return view('historyItem', compact('history'));
    }

    public function view_detail_barang($id){
        $detail = History::find($id);

        return view('baranghistorydetail', compact('detail'));
    }
}
