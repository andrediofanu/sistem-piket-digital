<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IzinGuru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
class IzinGuruController extends Controller
{
    //
    public function index()
    {
        $izins = IzinGuru::with(['user', 'kelas', 'adminPiket', 'mataPelajaran', 'statusIzinGuru'])->orderBy('created_at', 'desc')->get();
        return view('admin.izinGuru.index', compact('izins'));
    }
    public function indexByGuru()
    {
        $izins = IzinGuru::where('user_id', auth()->user()->id)->with(['user', 'kelas', 'adminPiket', 'mataPelajaran', 'statusIzinGuru'])->orderBy('created_at', 'desc')->get();
        return view('guru.izin.index', compact('izins'));
    }
    public function create()
    {


        // dd($current->name);
        $kelas = Kelas::all();
        $guru = User::where('role_id', 2)->get();
        $mapel = MataPelajaran::all();
        return view('admin.izinGuru.create', ['kelas' => $kelas, 'guru' => $guru, 'mapel' => $mapel]);
    }
    public function createByGuru()
    {
        // dd($current->name);
        $kelas = Kelas::all();
        $guru = User::where('id', auth()->user()->id)->get();
        $guruPengganti = User::where('role_id', 2)->get();
        $mapel = MataPelajaran::all();
        return view('guru.izin.create', ['kelas' => $kelas, 'guru' => $guru, 'mapel' => $mapel, 'guruPengganti' => $guruPengganti]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'tanggal_izin' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'guru_pengganti_id' => 'nullable|exists:users,id',
            'status_ketidakhadiran' => 'required|in:1,2', // 1 = Sakit, 2 = Izin
            'jam_mulai' => 'required|integer|min:1|max:11',
            'jam_selesai' => 'required|integer|min:1|max:11|gt:jam_mulai',
            'keterangan' => 'nullable|string',
            'bentuk_tugas' => 'nullable|string',
        ];

        $validated = $request->validate($rules);

        // Ensure valid jam range
        $jamMulai = (int) $validated['jam_mulai'];
        $jamSelesai = (int) $validated['jam_selesai'];

        // Attach logged-in guru as user_id
        $current = auth()->user();
        $guruId = $current ? $current->id : null;

        // Attach wali_kelas_id automatically if related to the chosen class
        $kelas = Kelas::find($validated['kelas_id']);
        $waliKelasId = $kelas ? $kelas->wali_kelas_id : null;

        $data = [
            'user_id' => $validated['user_id'],
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id' => $validated['kelas_id'],
            'mata_pelajaran_id' => $validated['mata_pelajaran_id'],
            'guru_pengganti_id' => $validated['guru_pengganti_id'] ?? null,
            'status_ketidakhadiran' => (int) $validated['status_ketidakhadiran'],
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'keterangan' => $validated['keterangan'] ?? null,
            'bentuk_tugas' => $validated['bentuk_tugas'] ?? null,
            'guru_id' => $guruId,
            'wali_kelas_id' => $waliKelasId,
        ];

        // If admin piket logged in, attach admin_piket_id
        if ($current && $current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
        }

        IzinGuru::create($data);

        return redirect()->route('izin-guru.index')->with('success', 'Izin guru berhasil ditambahkan.');
    }
    public function storeByGuru(Request $request)
    {
        // dd($request->all());
        $rules = [
            'tanggal_izin' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'guru_pengganti_id' => 'nullable|exists:users,id',
            'status_ketidakhadiran' => 'required|in:1,2', // 1 = Sakit, 2 = Izin
            'jam_mulai' => 'required|integer|min:1|max:11',
            'jam_selesai' => 'required|integer|min:1|max:11|gt:jam_mulai',
            'keterangan' => 'nullable|string',
            'bentuk_tugas' => 'nullable|string',
        ];

        $validated = $request->validate($rules);

        // Ensure valid jam range
        $jamMulai = (int) $validated['jam_mulai'];
        $jamSelesai = (int) $validated['jam_selesai'];

        // Attach logged-in guru as user_id
        $current = auth()->user();
        $guruId = $current ? $current->id : null;

        // Attach wali_kelas_id automatically if related to the chosen class
        $kelas = Kelas::find($validated['kelas_id']);
        $waliKelasId = $kelas ? $kelas->wali_kelas_id : null;

        $data = [
            'user_id' => $validated['user_id'],
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id' => $validated['kelas_id'],
            'mata_pelajaran_id' => $validated['mata_pelajaran_id'],
            'guru_pengganti_id' => $validated['guru_pengganti_id'] ?? null,
            'status_ketidakhadiran' => (int) $validated['status_ketidakhadiran'],
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'keterangan' => $validated['keterangan'] ?? null,
            'bentuk_tugas' => $validated['bentuk_tugas'] ?? null,
            'guru_id' => $guruId,
            'wali_kelas_id' => $waliKelasId,
        ];

        // If admin piket logged in, attach admin_piket_id
        if ($current && $current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
        }

        IzinGuru::create($data);

        return redirect()->route('guru.izin.index')->with('success', 'Izin guru berhasil ditambahkan.');
    }
    public function update(Request $request, IzinGuru $izinGuru, $statusId)
    {
        // Ensure the status ID is one of the allowed values (3 or 4)
        $validStatusIds = [2, 3];
        if (!in_array((int) $statusId, $validStatusIds)) {
            return back()->with('error', 'Aksi tidak valid.');
        }

        // Update the status_id
        $izinGuru->status_id = (int) $statusId;
        $izinGuru->save();

        // Determine the redirect message
        $action = ((int) $statusId === 2) ? 'disetujui' : 'ditolak';
        $message = "Izin Guru atas nama {$izinGuru->user->name} berhasil {$action}.";

        // Redirect back to the previous page with a success message
        return back()->with('success', $message);
    }

}
