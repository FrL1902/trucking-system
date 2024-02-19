<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function new_user_page()
    {
        return view('admin.newUser');
    }

    public function manage_user_page()
    {
        $user = User::all();

        return view('admin.manageUser', compact('user'));
    }

    // public function update(Request $request)
    // {

    //     dd($request->userIdHidden);
    // }

    public function make_new_user(Request $request)
    {
        // dd(2);
        $request->validate([
            'name' => 'required|unique:App\Models\User,name|min:4|max:50',
            'email' => 'required|unique:App\Models\User,email',
            'password' => 'required|min:6|max:20',
        ], [
            'name.unique' => 'Nama sudah terambil, masukkan nama yang berbeda',
            'name.min' => 'Nama minimal 4 karakter',
            'name.max' => 'Nama maksimal 50 karakter',
            'email.unique' => 'Email sudah terambil, masukkan email yang berbeda',
            'email.min' => 'Password minimal 6 karakter',
            'password.min' => 'Password maksimal 6 karakter',
            'password.max' => 'Password maksimal 20 karakter',
        ]);


        $data = new User();
        $data->email = $request->email;
        $data->name = $request->name;
        $data->password = Hash::make($request->password);
        $data->pass = $request->password;
        $data->save();

        return redirect()->back()->with('sukses_notif', 'User Baru Berhasil Dibuat');
    }

    public function destroy($id)
    {
        try {
            $decrypted = decrypt($id);
        } catch (DecryptException $e) {
            abort(403);
        }
        $user = User::find($decrypted);

        $deletedUser = $user->name;

        $user->delete();

        $userDeleted = "User" . " \"" . $deletedUser . "\" " . "berhasil di hapus";

        session()->flash('sukses_notif', $userDeleted);

        return redirect()->back();
    }

    public function newPasswordFromAdmin(Request $request)
    {
        $getUser = User::where('email', $request->email_Hidden)->first();

        if ($request->changePassword === $request->changePassword2) {
        } else {
            $request->session()->flash('gagal_notif', 'password baru harus sesuai di kedua kolom');
            return redirect()->back();
        }

        // validasi panjang karakter password
        $request->validate([
            'changePassword' => 'min:6|max:20',
        ], [
            'changePassword.min' => 'Password maksimal 6 karakter',
            'changePassword.max' => 'Password maksimal 20 karakter',
        ]);

        // validasi password baru tidak boleh sama dari password lama
        if (Hash::check($request->changePassword, $getUser->pass)) { //mungkin ganti ke bcrypt kali yak
            $request->session()->flash('gagal_notif', 'password baru harus berbeda dari password lama');
            return redirect()->back();
        } else {
            User::where('email',  $getUser->email)->update([
                'password' => Hash::make($request->changePassword),
                'pass' => $request->changePassword,
            ]);
            $request->session()->flash('sukses_notif', 'password berhasil diubah');
            return redirect()->back();
        }
    }
}
