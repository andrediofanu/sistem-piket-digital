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
        $izins = IzinSiswa::with(['user','kelas','adminPiket','waliKelas'])->orderBy('created_at','desc')->get();
        return view('admin.izinSiswa.index', compact('izins'));
    }
    public function create()
    {
    
        
        // dd($current->name);
        
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
            'jam_selesai'  => 'required|integer|min:1|max:11|gt:jam_mulai',
            'keterangan'   => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        $validator->sometimes('status_ketidakhadiran', 'required|in:1,2,3', function ($input) {
            return (string) ($input->jenis_izin ?? '') === '3';
        });

        $validated = $validator->validate();

        $statusKet = array_key_exists('status_ketidakhadiran', $validated)
            ? (int) $validated['status_ketidakhadiran']
            : 0;

        $data = [
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id'     => $validated['kelas_id'],
            'user_id'      => $validated['user_id'],
            'jenis_izin'   => (int) $validated['jenis_izin'],
            'status_ketidakhadiran' => $statusKet,
            'jam_mulai'    => (int) $validated['jam_mulai'],
            'jam_selesai' => (int) $validated['jam_selesai'],
            'keterangan'   => $validated['keterangan'] ?? null,
        ];

        $kelas = Kelas::find($validated['kelas_id']);
        $data['wali_kelas_id'] = $kelas ? $kelas->wali_kelas_id : null;
        // dd($data);
        $current = auth()->user();
        if ($current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
        }

        IzinSiswa::create($data);

        return redirect()->route('izin-siswa.index')->with('success', 'Izin siswa ditambahkan.');
    }
    public function update(Request $request, IzinSiswa $izinSiswa, $statusId)
    {
        // Ensure the status ID is one of the allowed values (3 or 4)
        $validStatusIds = [3, 4];
        if (!in_array((int)$statusId, $validStatusIds)) {
            return back()->with('error', 'Aksi tidak valid.');
        }

        // Update the status_id
        $izinSiswa->status_id = (int)$statusId;
        $izinSiswa->save();

        // Determine the redirect message
        $action = ((int)$statusId === 3) ? 'disetujui' : 'ditolak';
        $message = "Izin siswa a/n {$izinSiswa->user->name} berhasil {$action}.";

        // Redirect back to the previous page with a success message
        return back()->with('success', $message);
    }
}
