<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Category;
use App\Models\CategoryStock;
use App\Models\History;
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


            //buat history
            // ini buat history
            $lokasi = Location::find($request->lokasi_id);
            $lokasi = $lokasi->lokasi;          ####

            $model_data = CategoryStock::find( $barang_keluar->model_id);

            $kategori = Category::find($model_data->category_id);
            $kategori = $kategori->kategori;    #####

            $model = $model_data->model_name;   #####
            History::insert([
                'barang_id' =>      $request->masuk_id,
                'barang'    =>      'KELUAR',
                'lokasi'    =>      $lokasi,
                'by_user'   =>      auth()->user()->name, #### ganti ke auth,current user
                'status'    =>      'MASUK',
                'model'     =>      $model,
                'kategori'  =>      $kategori,
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
                'SN' =>             ($barang_keluar->SN) ? $barang_keluar->SN : '-',
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'assigned_user' =>  '-',
                'is_pc' =>          ($barang_keluar->is_pc) ? $barang_keluar->is_pc : false,
                'created_at' =>     Carbon::now(),
            ]);
        }

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Simpan');
    }

    public function update_barang_keluar($id)
    {
        $detail = BarangKeluar::find($id);
        return view('updatebarangkeluar', compact('detail'));
    }

    public function do_update_barang_keluar(Request $request){
        $data = BarangKeluar::find($request->masuk_id);
        $data_gambar1 = $data->gambar1;
        $data_gambar2 = $data->gambar2;

        if ($request->file('gambar1')) {
            // gambar pertama
            $manager = new ImageManager(new Driver());
            $imageName = time() . '_brg' . '.' . $request->file('gambar1')->getClientOriginalExtension();
            $img = $manager->read($request->file('gambar1'));
            $img = $img->resize(640, 360);
            $img->toJpeg(70)->save(base_path('public\\storage\\images\\keluarImage\\' . $imageName));
            $imageName1 = 'images/keluarImage/' . $imageName;


            $data_gambar1 = $imageName1;
        }

        if ($request->file('gambar2')) {
            // gambar kedua
            $manager2 = new ImageManager(new Driver());
            $imageName = time() . '_rcpt' . '.' . $request->file('gambar2')->getClientOriginalExtension();
            $img2 = $manager2->read($request->file('gambar2'));
            $img2 = $img2->resize(640, 360);
            $img2->toJpeg(70)->save(base_path('public\\storage\\images\\keluarImage\\' . $imageName));
            $imageName2 = 'images/keluarImage/' . $imageName;

            $data_gambar2 = $imageName2;
        }

        BarangKeluar::where('keluar_id', $request->masuk_id)->update([
            'Processor' =>      ($data->is_pc) ? $request->processor : '-',
            'RAM' =>            ($data->is_pc) ? $request->ram : '-',
            'GPU' =>            ($data->is_pc) ? $request->gpu : '-',
            'Storage' =>        ($data->is_pc) ? $request->storage : '-',
            'OS' =>             ($data->is_pc) ? $request->operating_system : '-',
            'License' =>        ($data->is_pc) ? $request->license : '-',
            'Monitor' =>        ($data->is_pc) ? $request->monitor : '-',
            'Keyboard' =>       ($data->is_pc) ? $request->keyboard : '-',
            'Mouse' =>          ($data->is_pc) ? $request->mouse : '-',
            'SN' =>             $request->SN,
            'assigned_user' =>  $request->assigned_user,
            'stok'=>            ($data->is_pc) ? 1 : $request->stok, #NI ngecek kalo ada SN ato ngga, kalo ngga ya diganti jadi -
            'gambar1' =>        $data_gambar1,
            'gambar2' =>        $data_gambar2,
            'keterangan' =>     $request->keterangan,
            'updated_at' =>     Carbon::now(),
        ]);

        $Stock = CategoryStock::find($data->model_id);

        if(!$data->is_pc){
            if($request->stok < $data->stok){
                $minus = $data->stok - $request->stok;
                $newStock = $Stock->stok - $minus;
                CategoryStock::where('model_id', $data->model_id)->update([
                    'stok' => $newStock,
                ]);
            }
            else if($request->stok > $data->stok){
                $added = $request->stok - $data->stok;
                $newStock = $Stock->stok + $added;
                CategoryStock::where('model_id', $data->model_id)->update([
                    'stok' => $newStock,
                ]);
            }
        }

        // buat history update ////////////////////////////////////////////////////////////
        $barang_keluar = BarangKeluar::find($request->masuk_id);
        $kategoriStok = CategoryStock::find($barang_keluar->model_id);

        // ini buat history
        $lokasi = Location::find($barang_keluar->location_id);
        $lokasi = $lokasi->lokasi;          ####

        $kategori = Category::find($kategoriStok->category_id);
        $kategori = $kategori->kategori;    #####

        $model = $kategoriStok->model_name;   #####
        History::insert([
            'barang_id' =>      $barang_keluar->keluar_id,
            'barang'    =>      'KELUAR',
            'lokasi'    =>      $lokasi,
            'by_user'   =>      auth()->user()->name, #### ganti ke auth,current user
            'status'    =>      'UPDATE',
            'model'     =>      $model,
            'kategori'  =>      $kategori,
            'Processor' =>      ($barang_keluar->is_pc) ? $request->processor : '-',
            'RAM' =>            ($barang_keluar->is_pc) ? $request->ram : '-',
            'GPU' =>            ($barang_keluar->is_pc) ? $request->gpu : '-',
            'Storage' =>        ($barang_keluar->is_pc) ? $request->storage : '-',
            'OS' =>             ($barang_keluar->is_pc) ? $request->operating_system : '-',
            'License' =>        ($barang_keluar->is_pc) ? $request->license : '-',
            'Monitor' =>        ($barang_keluar->is_pc) ? $request->monitor : '-',
            'Keyboard' =>       ($barang_keluar->is_pc) ? $request->keyboard : '-',
            'Mouse' =>          ($barang_keluar->is_pc) ? $request->mouse : '-',
            'stok' =>           ($barang_keluar->is_pc) ? 1 : $request->stok, ### REQUEST STOK
            'SN' =>             $request->SN,
            'keterangan' =>     $request->keterangan,
            'gambar1' =>        $data_gambar1,
            'gambar2' =>        $data_gambar2,
            'assigned_user' =>  $request->assigned_user,
            'is_pc' =>          ($barang_keluar->is_pc) ? $barang_keluar->is_pc : false,
            'created_at' =>     Carbon::now(),
        ]);

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Ubah');
    }
}
