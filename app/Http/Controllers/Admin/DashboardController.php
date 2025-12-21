<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    private function hitungPersen($thisMonth, $lastMonth)
    {
        if ($lastMonth == 0 && $thisMonth == 0) {
            return 0;
        }

        if ($lastMonth == 0 && $thisMonth > 0) {
            return 100;
        }

        return round((($thisMonth - $lastMonth) / $lastMonth) * 100);
    }

    public function index()
    {
        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();

        // ================= TOTAL =================
        $totalThisMonth = LaporanModel::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $totalLastMonth = LaporanModel::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $totalReports = LaporanModel::count();
        $totalPercent = $this->hitungPersen($totalThisMonth, $totalLastMonth);

        // ================= PENDING =================
        $pendingThisMonth = LaporanModel::where('status', 'menunggu')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $pendingLastMonth = LaporanModel::where('status', 'menunggu')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $pendingPercent = $this->hitungPersen($pendingThisMonth, $pendingLastMonth);

        // ================= IN PROGRESS =================
        $inProgresThisMonth = LaporanModel::where('status', 'diproses')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $inProgresLastMonth = LaporanModel::where('status', 'diproses')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $inProgresPercent = $this->hitungPersen($inProgresThisMonth, $inProgresLastMonth);

        // ================= RESOLVED =================
        $resolvedThisMonth = LaporanModel::where('status', 'selesai')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $resolvedLastMonth = LaporanModel::where('status', 'selesai')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $resolvedPercent = $this->hitungPersen($resolvedThisMonth, $resolvedLastMonth);

        // ================== recent laporan =================
        $recentReports = LaporanModel::latest()->limit(5)->get();

        // ================= lokasi ==================
        $locations = LaporanModel::select('latitude', 'longitude')->get();
        // dd($locations);

        // ================= AVG RESOLUTION TIME =================
        $avgResolutionDays = LaporanModel::where('status', 'selesai')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(HOUR, created_at, updated_at)) as avg_hours'))
            ->value('avg_hours');

        $avgResolutionDays = $avgResolutionDays
            ? round($avgResolutionDays / 24, 1)
            : 0;

            // dd($avgResolutionDays);

        // foreach ($recentReports as $item) {

        //     if ($item->latitude && $item->longitude) {

        //         $response = Http::withHeaders([
        //             'User-Agent' => 'LaporDesaApp/1.0 (admin@lapordesa.com)',
        //         ])->get('https://nominatim.openstreetmap.org/reverse', [
        //             'format' => 'json',
        //             'lat' => $item->latitude,
        //             'lon' => $item->longitude,
        //         ]);

        //         if ($response->successful()) {
        //             $item->alamat = $response->json()['display_name'] ?? 'Alamat tidak ditemukan';
        //         } else {
        //             $item->alamat = 'Alamat tidak ditemukan';
        //         }

        //         // supaya tidak kena limit API
        //         usleep(300000); // 0.3 detik
        //     } else {
        //         $item->alamat = 'Lokasi tidak tersedia';
        //     }
        // }

        // dd($alamat);

        return view('admin.dashboard', compact(
            'totalReports',
            'totalPercent',
            'pendingThisMonth',
            'pendingPercent',
            'inProgresThisMonth',
            'inProgresPercent',
            'resolvedThisMonth',
            'resolvedPercent',
            'recentReports',
            'locations',
            'avgResolutionDays'
        ));
    }
}
