<?php

namespace App\Http\Controllers;

use App\Models\IzinSiswa;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $role = auth()->user()->role->name;
        $countStatus1 = IzinSiswa::where('status_id', 1)->count();
        $countStatus2 = IzinSiswa::where('status_id', 2)->count();
        $todayCount = IzinSiswa::whereDate('tanggal_izin', today())->count();
        // dd($role);
        if (auth()->user()->isAdminPiket == 1) {
            $siswa = User::where('role_id', 3)->get();
            // dd($siswa);
        }
        return view('dashboard', compact('countStatus1', 'countStatus2', 'todayCount'));
    }
}
