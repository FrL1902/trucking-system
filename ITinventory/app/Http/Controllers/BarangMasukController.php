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
            $added = ($request->is_pc) ? 1 : $request->stok;
            $newStock = $Stock->stok + $added;
            CategoryStock::where('model_id', $request->model_id)->update([
                'stok' => $newStock,
            ]);


            // ini buat history
            $lokasi = Location::find($request->lokasi_id);
            $lokasi = $lokasi->lokasi;          ####

            $model_data = CategoryStock::find($request->model_id);

            $kategori = Category::find($model_data->category_id);
            $kategori = $kategori->kategori;    #####

            $model = $model_data->model_name;   #####
            History::insert([
                'barang_id' =>      $request->barang_masuk_id,
                'barang'    =>      'MASUK',
                'lokasi'    =>      $lokasi,
                'by_user'   =>      auth()->user()->name, #### ganti ke auth,current user
                'status'    =>      'MASUK',
                'model'     =>      $model,
                'kategori'  =>      $kategori,
                'Processor' =>      ($request->is_pc) ? $request->processor : '-',
                'RAM' =>            ($request->is_pc) ? $request->ram : '-',
                'GPU' =>            ($request->is_pc) ? $request->gpu : '-',
                'Storage' =>        ($request->is_pc) ? $request->storage : '-',
                'OS' =>             ($request->is_pc) ? $request->operating_system : '-',
                'License' =>        ($request->is_pc) ? $request->license : '-',
                'Monitor' =>        ($request->is_pc) ? $request->monitor : '-',
                'Keyboard' =>       ($request->is_pc) ? $request->keyboard : '-',
                'Mouse' =>          ($request->is_pc) ? $request->mouse : '-',
                'stok' =>           ($request->is_pc) ? 1 : $request->stok,
                'SN' =>             ($request->SN) ? $request->SN : '-',
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'is_pc' => ($request->is_pc) ? $request->is_pc : false,
                'assigned_user' =>  '-',
                'created_at' =>     Carbon::now(),
            ]);
        }

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Tambahkan');
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
                'Processor' => ($barang_masuk->is_pc) ? $barang_masuk->Processor : '-',
                'RAM' => ($barang_masuk->is_pc) ? $barang_masuk->RAM : '-',
                'GPU' => ($barang_masuk->is_pc) ? $barang_masuk->GPU : '-',
                'Storage' => ($barang_masuk->is_pc) ? $barang_masuk->Storage : '-',
                'OS' => ($barang_masuk->is_pc) ? $barang_masuk->OS : '-',
                'License' => ($barang_masuk->is_pc) ? $barang_masuk->License : '-',
                'Monitor' => ($barang_masuk->is_pc) ? $barang_masuk->Monitor : '-',
                'Keyboard' => ($barang_masuk->is_pc) ? $barang_masuk->Keyboard : '-',
                'Mouse' => ($barang_masuk->is_pc) ? $barang_masuk->Mouse : '-',
                'stok' => ($barang_masuk->is_pc) ? 1 : $request->stok,
                'SN' => ($barang_masuk->SN) ? $barang_masuk->SN : '-', #NI ngecek kalo ada SN ato ngga, kalo ngga ya diganti jadi -
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'assigned_user' => ($request->user) ? $request->user : '-',
                'is_pc' => ($barang_masuk->is_pc) ? $barang_masuk->is_pc : false,
                'created_at' =>     Carbon::now(),
            ]);


            if ($request->stok == $barang_masuk->stok) {
                $barang_masuk->delete();
                $status = 'KELUAR SEMUA';
            } else if ($request->stok < $barang_masuk->stok) {
                $newValue = $barang_masuk->stok - $request->stok;
                BarangMasuk::where('masuk_id', $barang_masuk->masuk_id)->update([
                    'stok' => $newValue,
                ]);
                $status = 'KELUAR SEBAGIAN';
            }

            // ini buat history
            $lokasi = Location::find($request->lokasi_id);
            $lokasi = $lokasi->lokasi;          ####

            $model_data = CategoryStock::find($barang_masuk->model_id);

            $kategori = Category::find($model_data->category_id);
            $kategori = $kategori->kategori;    #####

            $model = $model_data->model_name;   #####
            History::insert([
                'barang_id' =>      $request->keluar_id,
                'barang'    =>      'KELUAR',
                'lokasi'    =>      $lokasi,
                'by_user'   =>      auth()->user()->name, #### ganti ke auth,current user
                'status'    =>      $status,
                'model'     =>      $model,
                'kategori'  =>      $kategori,
                'Processor' => ($barang_masuk->is_pc) ? $barang_masuk->Processor : '-',
                'RAM' => ($barang_masuk->is_pc) ? $barang_masuk->RAM : '-',
                'GPU' => ($barang_masuk->is_pc) ? $barang_masuk->GPU : '-',
                'Storage' => ($barang_masuk->is_pc) ? $barang_masuk->Storage : '-',
                'OS' => ($barang_masuk->is_pc) ? $barang_masuk->OS : '-',
                'License' => ($barang_masuk->is_pc) ? $barang_masuk->License : '-',
                'Monitor' => ($barang_masuk->is_pc) ? $barang_masuk->Monitor : '-',
                'Keyboard' => ($barang_masuk->is_pc) ? $barang_masuk->Keyboard : '-',
                'Mouse' => ($barang_masuk->is_pc) ? $barang_masuk->Mouse : '-',
                'stok' => ($barang_masuk->is_pc) ? 1 : $request->stok,
                'SN' => ($barang_masuk->SN) ? $barang_masuk->SN : '-',
                'keterangan' =>     $request->keterangan,
                'gambar1' =>        $imageName1,
                'gambar2' =>        $imageName2,
                'assigned_user' => ($request->user) ? $request->user : '-',
                'is_pc' => ($barang_masuk->is_pc) ? $barang_masuk->is_pc : false,
                'created_at' =>     Carbon::now(),
            ]);

        }

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Assign/Keluarkan');
    }

    public function hapus_barang_masuk($id)
    {
        // dd($id);

        $barang_masuk = BarangMasuk::find($id);
        $kategoriStok = CategoryStock::find($barang_masuk->model_id);

        $stok = $kategoriStok->stok - $barang_masuk->stok;
        // update stok di kategoriStok

        $barang_masuk->delete();

        CategoryStock::where('model_id', $barang_masuk->model_id)->update([
            'stok' => $stok,
        ]);

        // ini buat history
        $lokasi = Location::find($barang_masuk->location_id);
        $lokasi = $lokasi->lokasi;          ####

        $kategori = Category::find($kategoriStok->category_id);
        $kategori = $kategori->kategori;    #####

        $model = $kategoriStok->model_name;   #####
        History::insert([
            'barang_id' =>      $barang_masuk->masuk_id,
            'barang'    =>      'MASUK',
            'lokasi'    =>      $lokasi,
            'by_user'   =>      auth()->user()->name, #### ganti ke auth,current user
            'status'    =>      'DELETE',
            'model'     =>      $model,
            'kategori'  =>      $kategori,
            'Processor' => ($barang_masuk->is_pc) ? $barang_masuk->Processor : '-',
            'RAM' => ($barang_masuk->is_pc) ? $barang_masuk->RAM : '-',
            'GPU' => ($barang_masuk->is_pc) ? $barang_masuk->GPU : '-',
            'Storage' => ($barang_masuk->is_pc) ? $barang_masuk->Storage : '-',
            'OS' => ($barang_masuk->is_pc) ? $barang_masuk->OS : '-',
            'License' => ($barang_masuk->is_pc) ? $barang_masuk->License : '-',
            'Monitor' => ($barang_masuk->is_pc) ? $barang_masuk->Monitor : '-',
            'Keyboard' => ($barang_masuk->is_pc) ? $barang_masuk->Keyboard : '-',
            'Mouse' => ($barang_masuk->is_pc) ? $barang_masuk->Mouse : '-',
            'stok' => ($barang_masuk->is_pc) ? 1 : $barang_masuk->stok,
            'SN' => ($barang_masuk->SN) ? $barang_masuk->SN : '-',
            'keterangan' =>     $barang_masuk->keterangan,
            'gambar1' =>        $barang_masuk->gambar1,
            'gambar2' =>        $barang_masuk->gambar2,
            'assigned_user' =>  '-',
            'is_pc' => ($barang_masuk->is_pc) ? $barang_masuk->is_pc : false,
            'created_at' =>     Carbon::now(),
        ]);

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Hapus');
    }

    public function view_detail_masuk($id)
    {
        // dd($id);
        $detail = BarangMasuk::find($id);
        // dd($detail);
        return view('barangmasukdetail', compact('detail'));
    }

    public function update_barang_masuk($id)
    {
        $detail = BarangMasuk::find($id);
        return view('updatebarangmasuk', compact('detail'));
    }

    public function do_update_barang_masuk(Request $request)
    {

        $data = BarangMasuk::find($request->masuk_id);
        $data_gambar1 = $data->gambar1;
        $data_gambar2 = $data->gambar2;

        if ($request->file('gambar1')) {
            // gambar pertama
            $manager = new ImageManager(new Driver());
            $imageName = time() . '_brg' . '.' . $request->file('gambar1')->getClientOriginalExtension();
            $img = $manager->read($request->file('gambar1'));
            $img = $img->resize(640, 360);
            $img->toJpeg(70)->save(base_path('public\\storage\\images\\masukImage\\' . $imageName));
            $imageName1 = 'images/masukImage/' . $imageName;

            // BarangMasuk::where('masuk_id', $request->masuk_id)->update([
            //     'gambar1' =>        $imageName1,
            // ]);

            $data_gambar1 = $imageName1;
        }

        if ($request->file('gambar2')) {
            // gambar kedua
            $manager2 = new ImageManager(new Driver());
            $imageName = time() . '_rcpt' . '.' . $request->file('gambar2')->getClientOriginalExtension();
            $img2 = $manager2->read($request->file('gambar2'));
            $img2 = $img2->resize(640, 360);
            $img2->toJpeg(70)->save(base_path('public\\storage\\images\\masukImage\\' . $imageName));
            $imageName2 = 'images/masukImage/' . $imageName;

            // BarangMasuk::where('masuk_id', $request->masuk_id)->update([
            //     'gambar2' =>        $imageName2,
            // ]);

            $data_gambar2 = $imageName2;
        }

        BarangMasuk::where('masuk_id', $request->masuk_id)->update([
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
            'stok'=>            ($data->is_pc) ? 1 : $request->stok, #NI ngecek kalo ada SN ato ngga, kalo ngga ya diganti jadi -
            'gambar1' =>        $data_gambar1,
            'gambar2' =>        $data_gambar2,
            'keterangan' =>     $request->keterangan,
            'updated_at' =>     Carbon::now(),
        ]);

        if(!$data->is_pc){
            if($request->stok < $data->stok){
                $Stock = CategoryStock::find($data->model_id);
                $minus = $data->stok - $request->stok;
                $newStock = $Stock->stok - $minus;
            }
            if($request->stok > $data->stok){
                $Stock = CategoryStock::find($data->model_id);
                $added = $request->stok - $data->stok;
                $newStock = $Stock->stok + $added;
            }
        }

        CategoryStock::where('model_id', $data->model_id)->update([
            'stok' => $newStock,
        ]);

        // buat history update ////////////////////////////////////////////////////////////
        $barang_masuk = BarangMasuk::find($request->masuk_id);
        $kategoriStok = CategoryStock::find($barang_masuk->model_id);

        // ini buat history
        $lokasi = Location::find($barang_masuk->location_id);
        $lokasi = $lokasi->lokasi;          ####

        $kategori = Category::find($kategoriStok->category_id);
        $kategori = $kategori->kategori;    #####

        $model = $kategoriStok->model_name;   #####
        History::insert([
            'barang_id' =>      $barang_masuk->masuk_id,
            'barang'    =>      'MASUK',
            'lokasi'    =>      $lokasi,
            'by_user'   =>      auth()->user()->name, #### ganti ke auth,current user
            'status'    =>      'UPDATE',
            'model'     =>      $model,
            'kategori'  =>      $kategori,
            'Processor' =>      ($barang_masuk->is_pc) ? $request->processor : '-',
            'RAM' =>            ($barang_masuk->is_pc) ? $request->ram : '-',
            'GPU' =>            ($barang_masuk->is_pc) ? $request->gpu : '-',
            'Storage' =>        ($barang_masuk->is_pc) ? $request->storage : '-',
            'OS' =>             ($barang_masuk->is_pc) ? $request->operating_system : '-',
            'License' =>        ($barang_masuk->is_pc) ? $request->license : '-',
            'Monitor' =>        ($barang_masuk->is_pc) ? $request->monitor : '-',
            'Keyboard' =>       ($barang_masuk->is_pc) ? $request->keyboard : '-',
            'Mouse' =>          ($barang_masuk->is_pc) ? $request->mouse : '-',
            'stok' =>           ($barang_masuk->is_pc) ? 1 : $request->stok, ### REQUEST STOK
            'SN' =>             $request->SN,
            'keterangan' =>     $request->keterangan,
            'gambar1' =>        $data_gambar1,
            'gambar2' =>        $data_gambar2,
            'assigned_user' =>  '-',
            'is_pc' =>          ($barang_masuk->is_pc) ? $barang_masuk->is_pc : false,
            'created_at' =>     Carbon::now(),
        ]);

        return redirect()->back()->with('sukses_notif', 'Data Berhasil Di Ubah');
    }
}
