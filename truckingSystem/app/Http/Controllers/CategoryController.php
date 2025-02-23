<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStock;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_trucks_page()
    {
        return view('truck');
    }
}
