<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    public function kategoriLaporan()
    {
        $kategori = KategoriModel::all();

        return view('users.laporan.kategori', [
            'kategori' => $kategori,
        ]);
        // dd($kategori);
    }

    public function buatLaporan($id)
    {
        $kategori = KategoriModel::findOrFail($id);

        return view('users.laporan.buat', [
            'kategori' => $kategori,
            // dd($kategori),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:tb_kategori,id',
            'judul' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $foto_laporan = Str::random(5).'.'.$request->foto_laporan->extension();
        $request->foto_laporan->move(public_path('foto_laporan'), $foto_laporan);

        // dd($request->all());

        LaporanModel::create([
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi_laporan' => $request->deskripsi,
            'foto_laporan' => $foto_laporan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect('/');
    }

    public function riwayatlaporan()
    {

        $laporan_user = Auth::user()->laporans()->get();

        return view('users.laporan.riwayat',
            ['laporan' => $laporan_user]);
    }

    public function show($id)
    {

        $riwayat = LaporanModel::findOrFail($id);

        // dd('haiiiii id '.$riwayat);
        return view('users.laporan.detail',
            ['data' => $riwayat]);
    }
}
