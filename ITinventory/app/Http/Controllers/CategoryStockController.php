<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Category;
use App\Models\CategoryStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryStockController extends Controller
{
    public function show_parts_page()
    {
        $category = Category::all();
        $categoryStock = CategoryStock::all();

        return view('categoryStock', compact('category', 'categoryStock'));
    }
}
