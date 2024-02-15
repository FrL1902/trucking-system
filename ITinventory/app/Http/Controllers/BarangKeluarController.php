<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BarangKeluarController extends Controller
{
    public function show_activeItem_page(){
        $location = Location::all();
        $barangKeluar = BarangKeluar::all();
        return view('activeItem', compact('barangKeluar', 'location'));
    }

    public function view_detail_keluar($id){
        $detail = BarangKeluar::find($id);
        return view('barangkeluardetail', compact('detail'));
    }

    public function simpan_barang_keluar(Request $request){

        if ($request->file('gambar1') && $request->file('gambar2')) {
            $barang_keluar = BarangKeluar::find($request->barang_id);
            // dd($barang_keluar->is_pc);
            // gambar pertama
            $manager = new ImageManager(new Driver());
            $imageName = time() . '_brg' . '.' . $request->file('gambar1')->getClientOriginalExtension();
            $img = $manager->read($request->file('gambar1'));
            $img = $img->resize(640, 360);
            $img->toJpeg(70)->save(base_path('public\\storage\\images\\masukImage\\' . $imageName));
            $imageName1 = 'images/masukImage/' . $imageName;

            // gambar kedua
            $manager2 = new ImageManager(new Driver());
            $imageName = time() . '_rcpt' . '.' . $request->file('gambar2')->getClientOriginalExtension();
            $img2 = $manager2->read($request->file('gambar2'));
            $img2 = $img2->resize(640, 360);
            $img2->toJpeg(70)->save(base_path('public\\storage\\images\\masukImage\\' . $imageName));
            $imageName2 = 'images/masukImage/' . $imageName;

            BarangMasuk::insert([
                'masuk_id' =>      $request->masuk_id,
                'model_id' =>       $barang_keluar->model_id,
                'location_id' =>    $request->lokasi_id,
                'Processor' =>      ($barang_keluar->is_pc) ? $barang_keluar->Processor : '-',
                'RAM' =>            ($barang_keluar->is_pc) ? $barang_keluar->RAM : '-',
                'GPU' =>            ($barang_keluar->is_pc) ? $barang_keluar->GPU : '-',
                'Storage' =>        ($barang_keluar->is_pc) ? $barang_keluar->Storage : '-',
                'OS' =>             ($barang_keluar->is_pc) ? $barang_keluar->OS : '-',
                'License' =>        ($barang_keluar->is_pc) ? $barang_keluar->License : '-',
                'Monitor' =>        ($barang_keluar->is_pc) ? $barang_keluar->Monitor : '-',
                'Keyboard' =>       ($barang_keluar->is_pc) ? $barang_keluar->Keyboard : '-',
                'Mouse' =>          ($barang_keluar->is_pc) ? $barang_keluar->Mouse : '-',
                'stok' =>           ($barang_keluar->is_pc) ? 1 : $request->stok,
                'SN' =>             ($barang_keluar->SN) ? $barang_keluar->SN : '-', #NI ngecek kalo ada SN ato ngga, kalo ngga ya diganti jadi -
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'is_pc' =>          ($barang_keluar->is_pc) ? $barang_keluar->is_pc : false,
                'created_at' =>     Carbon::now(),
            ]);

            if($request->stok == $barang_keluar->stok){
                $barang_keluar->delete();
            } else if($request->stok < $barang_keluar->stok) {
                $newValue = $barang_keluar->stok - $request->stok;
                BarangKeluar::where('keluar_id', $barang_keluar->keluar_id)->update([
                    'stok' => $newValue,
                ]);
            }
        }

        return redirect()->back();
    }
}
