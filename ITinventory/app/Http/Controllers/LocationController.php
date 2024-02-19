<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\CategoryStock;
use App\Models\Location;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //

    public function show_location_page(){
        $location = Location::all();

        return view('location', compact('location'));
    }

    public function add_new_location(Request $request)
    {
        $request->validate([
            'location_id' => 'required|unique:App\Models\Location,location_id|min:3|max:20|alpha_dash',
            'location_name' => 'required|min:1|max:50',
            'location_address' => 'required|min:1|max:100',
        ], [
            'location_id.required' => 'Kolom "ID Lokasi" Harus Diisi',
            'location_id.unique' => '"ID Lokasi" yang diisi sudah terambil, masukkan ID yang lain',
            'location_id.min' => '"ID Lokasi" minimal 3 karakter',
            'location_id.max' => '"ID Lokasi" maksimal 20 karakter',
            'location_id.alpha_dash' => '"ID Lokasi" hanya membolehkan huruf, angka, -, _ (spasi dan simbol lainnya tidak diterima)',
            'location_name.required' => 'Kolom "Lokasi" Harus Diisi',
            'location_name.min' => '"Lokasi" minimal 1 karakter',
            'location_name.max' => '"Lokasi" maksimal 50 karakter',
            'location_address.required' => 'Kolom "Alamat" Harus Diisi',
            'location_address.min' => '"Alamat" minimal 1 karakter',
            'location_address.max' => '"Alamat" maksimal 100 karakter',
        ]);

        $location = new Location();
        $location->location_id = $request->location_id;
        $location->lokasi = $request->location_name;
        $location->alamat = $request->location_address;
        $location->save();

        return redirect()->back();
    }

    public function edit_location(Request $request)
    {
        $request->validate([
            'location_name' => 'required|min:1|max:50',
            'location_address' => 'required|min:1|max:100',
        ], [
            'location_name.required' => 'Kolom "Lokasi" Harus Diisi',
            'location_name.min' => '"Lokasi" minimal 1 karakter',
            'location_name.max' => '"Lokasi" maksimal 50 karakter',
            'location_address.required' => 'Kolom "Alamat" Harus Diisi',
            'location_address.min' => '"Alamat" minimal 1 karakter',
            'location_address.max' => '"Alamat" maksimal 100 karakter',
        ]);

        Location::where('location_id', $request->locationIdHidden)->update([
            'lokasi' => $request->location_name,
            'alamat' => $request->location_address,
        ]);

        return redirect()->back();
    }

    public function delete_location($id){
        try {
            $decrypted = decrypt($id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $nullCheck1 = BarangMasuk::where('location_id', $decrypted)->first();
        $nullCheck2 = BarangKeluar::where('location_id', $decrypted)->first();
        $location = Location::find($decrypted);

        if (is_null($nullCheck1) && is_null($nullCheck2)) {
            $location->delete();
            return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Hapus');
        } else {
            session()->flash('gagal_notif', 'Data Sudah Digunakan oleh Barang');
            return redirect()->back();
        }
    }
}
