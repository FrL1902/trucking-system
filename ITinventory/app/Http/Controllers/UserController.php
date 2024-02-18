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

    public function makeUser(Request $request)
    {
        $request->validate([
            'usernameform' => 'required|unique:App\Models\User,name|min:4|max:50',
            'emailform' => 'required|unique:App\Models\User,email',
            'passwordform' => 'required|min:6|max:20',
            'optionsRadios' => 'required'
        ], [
            'usernameform.unique' => 'Username sudah terambil, masukkan username yang berbeda',
            'usernameform.min' => 'Username minimal 4 karakter',
            'usernameform.max' => 'Username maksimal 50 karakter',
            'emailform.unique' => 'Email sudah terambil, masukkan email yang berbeda',
            'passwordform.min' => 'Password minimal 6 karakter',
            'passwordform.max' => 'Password maksimal 20 karakter',
            'optionsRadios.required' => 'Kolom "Role" harus dipilih',
        ]);

        $account = new User();
        $account->name = $request->usernameform;
        $account->email = $request->emailform;
        $account->level = $request->optionsRadios;
        $account->password = Hash::make($request->passwordform);
        $account->pass = $request->passwordform;

        $account->save();

        // if ($request->optionsRadios == "customer") {
        //     $access = new UserAccess();
        //     $access->user_id = $request->usernameform;
        //     $access->customer_id = 0;
        //     $access->save();
        // }

        $userAdded = $request->usernameform . " [" . $request->optionsRadios . "] " . "berhasil di tambahkan";
        $request->session()->flash('sukses_add', $userAdded);

        return redirect()->back();

        // return $request->input();
    }

    public function destroy($id)
    {
        try {
            $decrypted = decrypt($id);
        } catch (DecryptException $e) {
            abort(403);
        }

        $user = User::find($decrypted);

        DB::table('user_permissions')->where('name', $user->name)->delete();
        DB::table('user_accesses')->where('user_id', $user->name)->delete();

        $deletedUser = $user->name;

        $user->delete();

        $userDeleted = "User" . " \"" . $deletedUser . "\" " . "berhasil di hapus";

        session()->flash('sukses_delete', $userDeleted);

        return redirect()->back();
    }


    public function tex(Request $request)
    {
        $userInfo = User::where('email', $request->userIdHidden)->first();
        $oldUsername = $userInfo->name;

        $request->validate([
            'usernameformupdate' => 'required|unique:App\Models\User,name|min:4|max:16',
        ]);

        User::where('email', $request->userIdHidden)->update([
            'name' => $request->usernameformupdate,
        ]);

        $request->session()->flash('sukses_editUser', $oldUsername);

        return redirect()->back();
    }

    public function newPasswordFromAdmin(Request $request)
    {
        // $tes = User::where('id', 321)->first();
        // dd('masok cok');
        // dd(is_null($tes));
        // dd($request->userIdHidden);

        $getUser = User::where('id', $request->userIdHidden)->first();

        // dd($getUser->name);

        if ($request->changePassword === $request->changePassword2) {
        } else {
            $request->session()->flash('passwordInputDifferent', 'Update Gagal: password baru harus sesuai di kedua kolom');
            return redirect()->back();
        }

        // validasi panjang karakter password
        $request->validate([
            'changePassword' => 'min:6|max:20',
        ]);

        // validasi password baru tidak boleh sama dari password lama
        if (Hash::check($request->changePassword, $getUser->password)) { //mungkin ganti ke bcrypt kali yak
            $request->session()->flash('passwordSameOld', 'Update Gagal: password baru harus berbeda dari password lama');
            return redirect()->back();
        } else {
            User::where('id',  $getUser->id)->update([
                'password' => Hash::make($request->changePassword),
                'pass' => $request->changePassword,
            ]);
            $request->session()->flash('passwordUpdated', 'Update Berhasil: password berhasil diubah');
            return redirect()->back();
        }
    }
}
