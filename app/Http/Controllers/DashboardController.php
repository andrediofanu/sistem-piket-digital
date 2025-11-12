<?php

namespace App\Http\Controllers;

use App\Models\IzinSiswa;
use App\Models\IzinGuru;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $role = auth()->user()->role_id;
        $countStatus1 = IzinSiswa::where('status_id', 1)->count();
        $countStatus2 = IzinSiswa::where('status_id', 2)->count();
        $todayCount = IzinSiswa::whereDate('tanggal_izin', today())->count();
        $todayCountSiswaSakit = IzinSiswa::where('status_ketidakhadiran', 1)->whereDate('tanggal_izin', today())->count();
        $todayCountSiswaIzin = IzinSiswa::where('status_ketidakhadiran', 2)->whereDate('tanggal_izin', today())->count();
        $todayCountSiswaAlpha = IzinSiswa::where('status_ketidakhadiran', 3)->whereDate('tanggal_izin', today())->count();
        $todayCountGuruSakit = IzinGuru::where('status_ketidakhadiran', 1)->whereDate('tanggal_izin', today())->count();
        $todayCountGuruIzin = IzinGuru::where('status_ketidakhadiran', 2)->whereDate('tanggal_izin', today())->count();
        $todayCountGuruAlpha = IzinGuru::where('status_ketidakhadiran', 3)->whereDate('tanggal_izin', today())->count();


        $countStatus1Guru = IzinGuru::where('status_id', 1)->count();
        $todayCountGuru = IzinGuru::whereDate('tanggal_izin', today())->count();


        $isAdminPiket = auth()->user()->isAdminPiket;
        $isWaliKelas = auth()->user()->isWaliKelas;
        // dd($role);
        $siswa = User::where('role_id', 3)->get();
        if (auth()->user()->isAdminPiket == 1) {
            // dd($siswa);
        }
        $countGuru = IzinGuru::select('user_id', DB::raw('COUNT(*) as request_count'))->where('status_id', 2)
            ->groupBy('user_id')
            ->with('user:id,name')
            ->get()
            ->map(function ($item) {
                return [
                    'user_name' => $item->user->name ?? 'Unknown Teacher',
                    'request_count' => $item->request_count,
                ];
            });
        // dd($countGuru);

        $requestsByDate = IzinGuru::select(
            DB::raw('DATE(tanggal_izin) as tanggal_izin_date'),
            DB::raw('COUNT(*) as request_count')
        )
            // Filter by status 3 as per your logic
            ->where('status_id', 3)
            // Group by the extracted date part
            ->groupBy(DB::raw('DATE(tanggal_izin)'))
            ->get();

        $countGuruByTanggal = $requestsByDate->map(function ($item) {
            return [
                'tanggal_izin' => $item->tanggal_izin_date,
                'request_count' => (int) $item->request_count,
            ];
        });

        // dd($countGuru);

        // $countGuruByTanggal = IzinGuru::select('tanggal_izin', DB::raw('COUNT(*) as request_count'))
        //     ->where('status_id', 3)
        //     ->groupBy(DB::raw('DATE(tanggal_izin)'))
        //     ->get()
        //     ->map(function ($item) {
        //         return [
        //             'tanggal_izin' => $item->tanggal_izin instanceof \Carbon\Carbon
        //                 ? $item->tanggal_izin->format('Y-m-d')
        //                 : $item->tanggal_izin,
        //             'request_count' => $item->request_count,
        //         ];
        //     });

        $countSiswa = IzinSiswa::select('user_id', DB::raw('COUNT(*) as request_count'))
            ->groupBy('user_id')
            ->with('user:id,name')
            ->get()
            ->map(function ($item) {
                return [
                    'user_name' => $item->user->name ?? 'Unknown Student',
                    'request_count' => $item->request_count,
                ];
            });
        $countSiswaByKelas = IzinSiswa::select('kelas_id', DB::raw('COUNT(*) as request_count'))
            // 1. Group by the class ID
            ->groupBy('kelas_id')
            // 2. Eager load the 'kelas' relationship, assuming the class name column is 'nama_kelas'
            ->with('kelas:id,name')
            ->get()
            ->map(function ($item) {
                return [
                    // 3. Map the class name for the chart label
                    'class_name' => $item->kelas->name ?? 'Unknown Class',
                    'request_count' => (int) $item->request_count,
                ];
            })
        ;


        return view('dashboard', compact('countStatus1', 'countStatus2', 'todayCount', 'isAdminPiket', 'isWaliKelas', 'role', 'siswa', 'countStatus1Guru', 'todayCountGuru', 'todayCountSiswaSakit', 'todayCountSiswaIzin', 'todayCountSiswaAlpha', 'todayCountGuruSakit', 'todayCountGuruIzin', 'todayCountGuruAlpha', 'countGuru', 'countSiswa', 'countGuruByTanggal', 'countSiswaByKelas'));
    }

}
