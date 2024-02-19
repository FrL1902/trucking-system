<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStock;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_category_page()
    {
        $category = Category::all();

        return view('category', compact('category'));
    }

    public function add_new_category(Request $request)
    {

        $request->validate([
            'category_id' => 'required|unique:App\Models\Category,category_id|min:3|max:20|alpha_dash',
            'category_name' => 'required|unique:App\Models\Category,kategori|min:1|max:50|regex:/^[\pL\s\-\0-9]+$/u',
        ], [
            'category_id.required' => 'Kolom "ID Kategori" Harus Diisi',
            'category_id.unique' => '"ID Kategori" yang diisi sudah terambil, masukkan ID yang lain',
            'category_id.min' => '"ID Kategori" minimal 3 karakter',
            'category_id.max' => '"ID Kategori" maksimal 20 karakter',
            'category_id.alpha_dash' => '"ID Kategori" hanya membolehkan huruf, angka, -, _ (spasi dan simbol lainnya tidak diterima)',
            'category_name.required' => 'Kolom "Nama Kategori" Harus Diisi',
            'category_name.unique' => 'Nama kategori sudah ada',
            'category_name.min' => '"Nama kategori" minimal 1 karakter',
            'category_name.max' => '"Nama kategori" maksimal 50 karakter',
            'category_name.regex' => '"Nama kategori" hanya membolehkan huruf, angka, spasi, dan tanda penghubung(-)',
        ]);

        $category = new Category();
        $category->category_id = $request->category_id;
        $category->kategori = $request->category_name;
        $category->save();

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Tambahkan');
    }

    public function edit_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:App\Models\Category,kategori|min:1|max:50|regex:/^[\pL\s\-\0-9]+$/u',
        ], [
            'category_name.required' => 'Kolom "Nama Kategori" Harus Diisi',
            'category_name.unique' => 'Nama kategori sudah ada',
            'category_name.min' => '"Nama kategori" minimal 1 karakter',
            'category_name.max' => '"Nama kategori" maksimal 50 karakter',
            'category_name.regex' => '"Nama kategori" hanya membolehkan huruf, angka, spasi, dan tanda penghubung(-)',
        ]);

        Category::where('category_id', $request->category_id)->update([
            'kategori' => $request->category_name,
        ]);

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Ubah');
    }

    public function delete_category($id){
        try {
            $decrypted = decrypt($id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $nullCheck = CategoryStock::where('category_id', $decrypted)->first();
        $category = Category::find($decrypted);
        if (is_null($nullCheck)) {
            $category->delete();
            return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Hapus');
        } else {
            session()->flash('gagal_notif', 'Data Sudah Digunakan oleh Barang');
            return redirect()->back();
        }
    }
}
