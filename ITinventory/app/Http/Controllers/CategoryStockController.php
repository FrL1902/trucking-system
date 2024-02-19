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
    public function show_categoryStock_page()
    {
        $category = Category::all();
        $categoryStock = CategoryStock::all();

        return view('categoryStock', compact('category', 'categoryStock'));
    }

    public function add_new_categoryStock(Request $request)
    {
        $request->validate([
            'model_id' => 'required|unique:App\Models\CategoryStock,model_id|min:3|max:20|alpha_dash',
            'itemImage' => 'required|mimes:jpeg,png,jpg|max:10240',
            'gambar2' => 'required|mimes:jpeg,png,jpg|max:10240',
        ], [
            'model_id.required' => 'Kolom "Model ID" Harus Diisi',
            'model_id.unique' => '"Model ID" yang diisi sudah terambil, masukkan ID yang lain',
            'model_id.min' => '"Model ID" minimal 3 karakter',
            'model_id.max' => '"Model ID" maksimal 20 karakter',
            'model_id.alpha_dash' => '"Model ID" hanya membolehkan huruf, angka, -, _ (spasi dan simbol lainnya tidak diterima)',
            'itemImage.required' => 'Kolom "Gambar" harus diisi',
            'itemImage.mimes' => 'Tipe foto yang diterima hanya jpeg, jpg, dan png',
            'itemImage.max' => 'Ukuran foto harus dibawah 10 MB',
        ]);

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

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Tambahkan');
    }

    public function model_detail_page($id)
    {
        $data = CategoryStock::where('model_id', $id)->first();
        $barangMasuk = DB::table('barang_masuk')->where('model_id', $id)->get();
        $barangKeluar = DB::table('barang_keluar')->where('model_id', $id)->get();

        return view('barangmodeldetail', compact('data', 'barangMasuk', 'barangKeluar'));
    }
}
