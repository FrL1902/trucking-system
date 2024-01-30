<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryStockController extends Controller
{
    public function show_categoryStock_page(){
        return view('categoryStock');
    }
}
