<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['laporans' => function ($q) {
            $q->select('id', 'user_id', 'judul', 'kategori_id', 'status', 'created_at')
                ->with('kategori:id,nama_kategori');
        }])->when(request('keyword'), function ($query, $keyword) {
            $query->where('nama', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");
        })->latest()->paginate(10)->withQueryString();
        // dd($users);

        return view('admin.user.user', [
            'user' => $users,
            // 'laporan' => $laporan,
        ]);
    }
}
