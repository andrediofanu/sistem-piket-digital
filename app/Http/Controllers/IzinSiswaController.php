<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class IzinSiswaController extends Controller
{
    //
    public function index()
    {
        $role = auth()->user()->role->name;
        // dd($role);
        if (auth()->user()->isAdminPiket == 1){
            $siswa = User::where('role_id', 3)->get();
            // dd($siswa);
        }
        return view('admin.izinGuru.index');
    }
}
