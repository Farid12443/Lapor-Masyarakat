<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $categories = KategoriModel::orderBy('nama_kategori')->get();

        $reports = LaporanModel::when(request('keyword'), function ($query, $keyword) {
            $query->where('judul', 'like', "%{$keyword}%")
                ->orWhere('deskripsi_laporan', 'like', "%{$keyword}%");
        })->when(request('status'), function ($query, $status) {
            $query->where('status', $status);
        })->when(request('kategori'), fn ($q, $kategori) => $q->where('kategori_id', $kategori)
        )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // dd($reports);

        return view('admin.reports.reports', [
            'reports' => $reports,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $data = LaporanModel::findOrFail($id);

        $data->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }
}
