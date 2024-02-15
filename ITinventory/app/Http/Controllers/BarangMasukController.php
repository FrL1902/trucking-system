<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\CategoryStock;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BarangMasukController extends Controller
{
    public function show_inactiveItem_page()
    {
        $location = Location::all();
        $model = CategoryStock::all();
        $barangMasuk = BarangMasuk::all();

        return view('inactiveItem', compact('location', 'model', 'barangMasuk'));
    }

    public function add_new_barang_masuk(Request $request)
    {
        if ($request->file('gambar1') && $request->file('gambar2')) {
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
                'masuk_id' =>       $request->barang_masuk_id,
                'model_id' =>       $request->model_id,
                'location_id' =>    $request->lokasi_id,
                'Processor' => ($request->is_pc) ? $request->processor : '-',
                'RAM' => ($request->is_pc) ? $request->ram : '-',
                'GPU' => ($request->is_pc) ? $request->gpu : '-',
                'Storage' => ($request->is_pc) ? $request->storage : '-',
                'OS' => ($request->is_pc) ? $request->operating_system : '-',
                'License' => ($request->is_pc) ? $request->license : '-',
                'Monitor' => ($request->is_pc) ? $request->monitor : '-',
                'Keyboard' => ($request->is_pc) ? $request->keyboard : '-',
                'Mouse' => ($request->is_pc) ? $request->mouse : '-',
                'stok' => ($request->is_pc) ? 1 : $request->stok,
                'SN' => ($request->SN) ? $request->SN : '-', #NI ngecek kalo ada SN ato ngga, kalo ngga ya diganti jadi -
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'is_pc' => ($request->is_pc) ? $request->is_pc : false,
                'created_at' =>     Carbon::now(),
            ]);

            $Stock = CategoryStock::find($request->model_id);
            $newStock = $Stock->stok + ($request->is_pc) ? 1 : $request->stok;
            CategoryStock::where('model_id', $request->model_id)->update([
                'stok' => $newStock,
            ]);
        }

        return redirect()->back();
    }

    public function assign_barang_masuk(Request $request)
    {
        if ($request->file('gambar1') && $request->file('gambar2')) {
            $barang_masuk = BarangMasuk::find($request->barang_id);
            // dd($barang_masuk->is_pc);
            // gambar pertama
            $manager = new ImageManager(new Driver());
            $imageName = time() . '_brg' . '.' . $request->file('gambar1')->getClientOriginalExtension();
            $img = $manager->read($request->file('gambar1'));
            $img = $img->resize(640, 360);
            $img->toJpeg(70)->save(base_path('public\\storage\\images\\keluarImage\\' . $imageName));
            $imageName1 = 'images/keluarImage/' . $imageName;

            // gambar kedua
            $manager2 = new ImageManager(new Driver());
            $imageName = time() . '_rcpt' . '.' . $request->file('gambar2')->getClientOriginalExtension();
            $img2 = $manager2->read($request->file('gambar2'));
            $img2 = $img2->resize(640, 360);
            $img2->toJpeg(70)->save(base_path('public\\storage\\images\\keluarImage\\' . $imageName));
            $imageName2 = 'images/keluarImage/' . $imageName;

            BarangKeluar::insert([
                'keluar_id' =>      $request->keluar_id,
                'model_id' =>       $barang_masuk->model_id,
                'location_id' =>    $request->lokasi_id,
                'Processor' =>      ($barang_masuk->is_pc) ? $barang_masuk->Processor : '-',
                'RAM' =>            ($barang_masuk->is_pc) ? $barang_masuk->RAM : '-',
                'GPU' =>            ($barang_masuk->is_pc) ? $barang_masuk->GPU : '-',
                'Storage' =>        ($barang_masuk->is_pc) ? $barang_masuk->Storage : '-',
                'OS' =>             ($barang_masuk->is_pc) ? $barang_masuk->OS : '-',
                'License' =>        ($barang_masuk->is_pc) ? $barang_masuk->License : '-',
                'Monitor' =>        ($barang_masuk->is_pc) ? $barang_masuk->Monitor : '-',
                'Keyboard' =>       ($barang_masuk->is_pc) ? $barang_masuk->Keyboard : '-',
                'Mouse' =>          ($barang_masuk->is_pc) ? $barang_masuk->Mouse : '-',
                'stok' =>           ($barang_masuk->is_pc) ? 1 : $request->stok,
                'SN' =>             ($barang_masuk->SN) ? $barang_masuk->SN : '-', #NI ngecek kalo ada SN ato ngga, kalo ngga ya diganti jadi -
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'assigned_user' =>  ($request->user) ? $request->user : '-',
                'is_pc' =>          ($barang_masuk->is_pc) ? $barang_masuk->is_pc : false,
                'created_at' =>     Carbon::now(),
            ]);

            if($request->stok == $barang_masuk->stok){
                $barang_masuk->delete();
            } else if($request->stok < $barang_masuk->stok) {
                $newValue = $barang_masuk->stok - $request->stok;
                BarangMasuk::where('masuk_id', $barang_masuk->masuk_id)->update([
                    'stok' => $newValue,
                ]);
            }

            // $Stock = CategoryStock::find($request->model_id);
            // $newStock = $Stock->stok - ($request->is_pc) ? 1 : $request->stok;
            // CategoryStock::where('model_id', $request->model_id)->update([
            //     'stok' => $newStock,
            // ]);
        }

        return redirect()->back();
    }

    public function view_detail_masuk($id)
    {
        // dd($id);
        $detail = BarangMasuk::find($id);
        // dd($detail);
        return view('barangmasukdetail', compact('detail'));
    }
}
