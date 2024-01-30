<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryItemController extends Controller
{
    public function show_historyItem_page(){
        return view('historyItem');
    }
}
