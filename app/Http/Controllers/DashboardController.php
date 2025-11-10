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
        return view('dashboard', compact('countStatus1', 'countStatus2', 'todayCount', 'isAdminPiket', 'isWaliKelas', 'role', 'siswa', 'countStatus1Guru', 'todayCountGuru', 'todayCountSiswaSakit', 'todayCountSiswaIzin', 'todayCountSiswaAlpha', 'todayCountGuruSakit', 'todayCountGuruIzin', 'todayCountGuruAlpha'));
    }
    
}
