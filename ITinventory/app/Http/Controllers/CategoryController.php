<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        // $request->validate([
        //     'category_id' => 'required|unique:App\Models\Category,category_id|min:2|max:20|alpha_dash',
        //     // 'category_name' => ['required|min:2|max:50|regex:/[\\/:*?"<>]/'],
        //     'category_name' => 'required|min:2|max:50|regex:/^[\pL\s\-\0-9]+$/u',
        // ], [
        //     'category_id.required' => 'Kolom "ID Kategori" Harus Diisi',
        //     'category_id.unique' => '"ID Kategori" yang diisi sudah terambil, masukkan ID yang lain',
        //     'category_id.min' => '"ID Kategori" minimal 3 karakter',
        //     'category_id.max' => '"ID Kategori" maksimal 20 karakter',
        //     'category_id.alpha_dash' => '"ID Kategori" hanya membolehkan huruf, angka, -, _ (spasi dan simbol lainnya tidak diterima)',
        //     'category_name.required' => 'Kolom "Nama Kategori" Harus Diisi',
        //     'category_name.min' => '"Nama Kategori" minimal 3 karakter',
        //     'category_name.max' => '"Nama Kategori" maksimal 50 karakter',
        //     'category_name.regex' => '"Nama Kategori" hanya membolehkan huruf, angka, spasi, hyphen, dan tanda penghubung(-)',
        // ]);
        // dd($request->category_id . $request->category_name);

        $category = new Category();
        $category->category_id = $request->category_id;
        $category->kategori = $request->category_name;
        $category->save();

        // $itemAdded = "Brand " . "\"" . $request->brandname . "\"" . " berhasil di tambahkan";
        // $request->session()->flash('sukses_addNewBrand', $itemAdded);
        return redirect()->back();
    }

    public function edit_category(Request $request)
    {
        // dd($request->category_name);
        // $request->validate([
        //     'category_name' => 'required|unique:App\Models\Category,category_name|min:2|max:50|regex:/^[\pL\s\-\0-9]+$/u',
        // ], [
        //     'category_name.required' => 'Kolom "Nama Kategori" Harus Diisi',
        //     'category_name.unique' => '"Nama Kategori" tidak boleh sama dengan yang sebelumnya',
        //     'category_name.min' => '"Nama Kategori" minimal 2 karakter',
        //     'category_name.max' => '"Nama Kategori" maksimal 50 karakter',
        //     'category_name.regex' => '"Nama Kategori" hanya membolehkan huruf, angka, spasi, hyphen, dan tanda penghubung(-)',
        // ]);

        Category::where('category_id', $request->category_id)->update([
            'kategori' => $request->category_name,
        ]);

        return redirect()->back();
    }
}
