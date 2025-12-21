<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    public function index()
    {
        $data_user = Auth::user();

        return view('users.profil.profil', [
            'data' => $data_user,
            // dd($data_user),
        ]);
    }

    public function editFoto(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'foto' => 'nullable|image|max:2048',
        ]);

        // hash foto
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($user->foto_profil && $user->foto_profil !== 'default.png') {
                $oldPath = public_path('foto_profil_user/'.$user->foto_profil);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // pindah foto baru
            $nama_file = Str::random(5).'.'.$request->foto->extension();
            $request->foto->move(public_path('foto_profil_user'), $nama_file);

        } else {
            $nama_file = $user->foto_profil; // tetap pakai foto lama
        }

        // dd($nama_file);

        //
        $user->update([
            'foto_profil' => $nama_file,
        ]);

        return back();
    }

    public function editpassword(Request $request)
    {
        // error bag
        $validator = Validator::make($request->all(), [
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ], [
            'password_lama.required' => 'Password lama harus diisi!',
            'password_baru.required' => 'Password baru harus diisi!',
            'password_baru.min' => 'Password minimal 8 karakter',
            'password_baru.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'password')->withInput();
        }

        $user = Auth::user();

        // cek password lama
        if (! Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors([
                'password_lama' => 'Password lama tidak sesuai',
            ], 'password')->withInput();
        }

        // update password
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return back()->with('success', 'Password berhasil diubah!');
    }

    public function editemail(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email_baru' => 'required|email|unique:tb_users,email',
                'password' => 'required',
            ],
            [
                'email_baru.required' => 'Email baru harus diisi!',
                'email_baru.email' => 'Format email tidak valid!',
                'email_baru.unique' => 'Email sudah terdaftar!',
                'password.required' => 'Password harus diisi!',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator, 'email')->withInput();
        }

        $user = Auth::user();

        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah!',
            ], 'email')->withInput();
        }

        // dd($request->all());

        // update email
        $user->email = $request->email_baru;
        $user->save();

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function editprofil()
    {
        $user = Auth::user();

        return view('users.profil.editprofil', [
            'user' => $user,
        ]);
    }

    public function updateprofil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'tanggal_lahir' => 'nullable|date',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'alamat.required' => 'Alamat harus diisi!',
            'no_hp.required' => 'Nomor HP harus diisi!',
        ]);

        //  dd($request->all());

        // // update profil
        $user->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        // return redirect('/profil');
        return back();

    }
}
