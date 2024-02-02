<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStock;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryStockController extends Controller
{
    public function show_categoryStock_page()
    {
        $category = Category::all();
        $categoryStock = CategoryStock::all();

        return view('categoryStock', compact('category', 'categoryStock'));
    }

    public function add_new_categoryStock(Request $request)
    {
        // dd($request->kategori_id);
        if ($request->file('itemImage')) {
            // dd(2);
            $manager = new ImageManager(new Driver());
            $imageName = time() . '.' . $request->file('itemImage')->getClientOriginalExtension();

            $img = $manager->read($request->file('itemImage'));
            $img = $img->resize(640, 360);

            $img->toJpeg(70)->save(base_path('public\\storage\\images\\dataImage\\' . $imageName));
            // dd(12);
        //    dd($imageName);
            $imageName = 'images/dataImage/' . $imageName;
            CategoryStock::insert([
                'model_name' => $request->model_name,
                'model_id' => $request->model_id,
                'category_id' => $request->kategori_id,
                // 'stok' => $request->,
                'gambar' => $imageName,
            ]);
        }

        return redirect()->back();
    }
}
