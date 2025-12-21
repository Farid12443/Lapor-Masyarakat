<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data_user = Auth::user();
        $laporan_user = Auth::user()->laporans()->latest()->limit(3)->get();

        // laporan selesai
        $laporan_selesai = Auth::user()->laporans()->where('status', 'selesai')->get();
        $laporan_diproses = Auth::user()->laporans()->where('status', 'diproses')->get();

        return view('users.index', [
            'data' => $data_user,
            'laporan' => $laporan_user,
            'laporan_selesai' => $laporan_selesai,
            'laporan_diproses' => $laporan_diproses
        ]);
    }
}
