<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\IzinSiswa;
use App\Models\Kelas;

class IzinSiswaController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role->name;
        // dd($role);
        if (auth()->user()->isAdminPiket == 1){
            $siswa = User::where('role_id', 3)->get();
            // dd($siswa);
        }
        return view('admin.izinSiswa.index');
    }
    public function create()
    {
        $kelas = Kelas::all();
        $siswa = User::where('role_id', 3)->get();
        return view('admin.izinSiswa.create',['kelas' => $kelas, 'siswa' => $siswa]);
    }
    public function store(Request $request)
    {
        $rules = [
            'tanggal_izin' => 'required|date',
            'kelas_id'     => 'required|exists:kelas,id',
            'user_id'      => 'required|exists:users,id',
            'jenis_izin'   => 'required|in:1,2,3',
            'jam_mulai'    => 'required|integer|min:1|max:11',
            'jam_selesai'   => 'required|integer|min:1|max:11|gt:jam_mulai',
            'keterangan'   => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // require status_ketidakhadiran only when jenis_izin == 3
        $validator->sometimes('status_ketidakhadiran', 'required|in:1,2,3', function ($input) {
            return (string) ($input->jenis_izin ?? '') === '3';
        });

        $validated = $validator->validate();

        // use status_ketidakhadiran field (not 'status')
        $statusKet = array_key_exists('status_ketidakhadiran', $validated)
            ? (int) $validated['status_ketidakhadiran']
            : 0; // default to 0 to avoid DB error

        $data = [
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id'     => $validated['kelas_id'],
            'user_id'      => $validated['user_id'],
            'jenis_izin'   => (int) $validated['jenis_izin'],
            'status_ketidakhadiran' => $statusKet, // always present now
            'jam_mulai'    => (int) $validated['jam_mulai'],
            'jam_selesai' => (int) $validated['jam_selesai'],
            'keterangan'   => $validated['keterangan'] ?? null,
        ];
        $current = auth()->user();
        // dd($current->name);
        if ($current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
            $current->save();
        
        }
        if ($current->isWaliKelas == 1) {
            $data['wali_kelas-id'] = $current->id;
            $current->save();
        }

        IzinSiswa::create($data);

        return redirect()->route('izin-siswa.index')->with('success', 'Izin siswa ditambahkan.');
    }
}
