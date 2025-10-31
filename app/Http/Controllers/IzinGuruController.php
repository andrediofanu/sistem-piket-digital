<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IzinGuru;
class IzinGuruController extends Controller
{
    //
    public function index()
    {
        $izins = IzinGuru::with(['user', 'kelas', 'adminPiket', 'mataPelajaran','statusIzinGuru'])->orderBy('created_at', 'desc')->get();
        return view('admin.izinGuru.index', compact('izins'));
    }
}
