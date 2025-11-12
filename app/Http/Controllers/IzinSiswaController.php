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
        $izins = IzinSiswa::whereIn('jenis_izin', [1, 2]) // Condition 1: Masuk Kelas (Terlambat) or Meninggalkan Kelas
            ->orWhere(function ($query) {
                $query->where('jenis_izin', 3) // Condition 2A: Is 'Tidak Masuk Madrasah'
                    ->whereIn('status_ketidakhadiran', [1, 2]); // Condition 2B: AND is 'Sakit' or 'Izin'
            })
            ->with(['user', 'kelas', 'adminPiket', 'waliKelas'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.izinSiswa.index', compact('izins'));
    }
    public function indexBySiswa()
    {
        $izins = IzinSiswa::where('user_id', auth()->user()->id)->with(['kelas', 'adminPiket', 'waliKelas'])->orderBy('created_at', 'desc')->get();
        return view('siswa.izin.index', compact('izins'));
    }
    public function indexByWaliKelas()
    {
        $izins = IzinSiswa::whereIn('jenis_izin', [1, 2]) // Condition 1: Masuk Kelas (Terlambat) or Meninggalkan Kelas
            ->orWhere(function ($query) {
                $query->where('jenis_izin', 3) // Condition 2A: Is 'Tidak Masuk Madrasah'
                    ->whereIn('status_ketidakhadiran', [1, 2]); // Condition 2B: AND is 'Sakit' or 'Izin'
            })->where("wali_kelas_id", auth()->user()->id)->with(['kelas', 'adminPiket', 'waliKelas'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('waliKelas.izinSiswa.index', compact('izins'));
    }
    public function indexAlpha()
    {
        $alphas = IzinSiswa::where('status_ketidakhadiran', 3)->with(['user', 'kelas', 'adminPiket', 'waliKelas'])->orderBy('created_at', 'desc')->get();
        return view('admin.alpha.index', compact('alphas'));

    }
    public function create()
    {
        $kelas = Kelas::all();
        $siswa = User::where('role_id', 3)->get();
        return view('admin.izinSiswa.create', ['kelas' => $kelas, 'siswa' => $siswa]);
    }
    public function createBySiswa()
    {
        $kelas = Kelas::where('id', auth()->user()->kelas_id)->get();
        $siswa = User::where('id', auth()->user()->id)->get();
        return view('siswa.izin.create', compact('kelas', 'siswa'));
    }
    public function createAlpha()
    {
        $kelas = Kelas::all();
        $siswa = User::where('role_id', 3)->get();
        return view('admin.alpha.create', ['kelas' => $kelas, 'siswa' => $siswa]);
    }
    public function store(Request $request)
    {
        $rules = [
            'tanggal_izin' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'user_id' => 'required|exists:users,id',
            'jenis_izin' => 'required|in:1,2,3',
            'keterangan' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Conditional rules
        $validator->sometimes(['jam_mulai', 'jam_selesai'], 'required|integer|min:1|max:11', function ($input) {
            return in_array($input->jenis_izin, ['1', '2']);
        });

        $validator->sometimes('jam_selesai', 'gt:jam_mulai', function ($input) {
            return in_array($input->jenis_izin, ['1', '2']);
        });

        $validator->sometimes('status_ketidakhadiran', 'required|in:1,2,3', function ($input) {
            return (string) ($input->jenis_izin ?? '') === '3';
        });

        $validated = $validator->validate();

        // If jenis_izin == 3 (Tidak Masuk Madrasah), set default jam values
        if ((int) $validated['jenis_izin'] === 3) {
            $validated['jam_mulai'] = 1;
            $validated['jam_selesai'] = 12;
        }

        // Safely get status_ketidakhadiran
        $statusKet = array_key_exists('status_ketidakhadiran', $validated)
            ? (int) $validated['status_ketidakhadiran']
            : 0;

        // Safely get jam values
        $jamMulai = array_key_exists('jam_mulai', $validated) ? (int) $validated['jam_mulai'] : null;
        $jamSelesai = array_key_exists('jam_selesai', $validated) ? (int) $validated['jam_selesai'] : null;

        // Attach wali_kelas_id
        $kelas = Kelas::find($validated['kelas_id']);

        // 🟡 Add this validation here
        if (!$kelas || !$kelas->wali_kelas_id) {
            return back()
                ->withInput()
                ->with('warning', 'Kelas belum memiliki wali kelas, mohon hubungi admin.');
        }

        $data = [
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id' => $validated['kelas_id'],
            'user_id' => $validated['user_id'],
            'jenis_izin' => (int) $validated['jenis_izin'],
            'status_ketidakhadiran' => $statusKet,
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'keterangan' => $validated['keterangan'] ?? null,
            'wali_kelas_id' => $kelas->wali_kelas_id,
        ];

        // Attach admin piket if logged in user is admin piket
        $current = auth()->user();
        if ($current && $current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
        }

        IzinSiswa::create($data);

        return redirect()->route('izin-siswa.index')->with('success', 'Izin siswa ditambahkan.');
    }

    public function storeAlpha(Request $request)
    {
        $rules = [
            'tanggal_izin' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'user_id' => 'required|exists:users,id',
            'jenis_izin' => 'required|in:1,2,3',
            'keterangan' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Conditional rules
        $validator->sometimes(['jam_mulai', 'jam_selesai'], 'required|integer|min:1|max:11', function ($input) {
            return in_array($input->jenis_izin, ['1', '2']);
        });

        $validator->sometimes('jam_selesai', 'gt:jam_mulai', function ($input) {
            return in_array($input->jenis_izin, ['1', '2']);
        });

        $validator->sometimes('status_ketidakhadiran', 'required|in:1,2,3', function ($input) {
            return (string) ($input->jenis_izin ?? '') === '3';
        });

        $validated = $validator->validate();

        // If jenis_izin == 3 (Tidak Masuk Madrasah), set default jam values
        if ((int) $validated['jenis_izin'] === 3) {
            $validated['jam_mulai'] = 1;
            $validated['jam_selesai'] = 12;
        }

        // Safely get status_ketidakhadiran
        $statusKet = array_key_exists('status_ketidakhadiran', $validated)
            ? (int) $validated['status_ketidakhadiran']
            : 0;

        // Safely get jam values (use array_key_exists to avoid undefined index)
        $jamMulai = array_key_exists('jam_mulai', $validated) ? (int) $validated['jam_mulai'] : null;
        $jamSelesai = array_key_exists('jam_selesai', $validated) ? (int) $validated['jam_selesai'] : null;

        $data = [
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id' => $validated['kelas_id'],
            'user_id' => $validated['user_id'],
            'jenis_izin' => (int) $validated['jenis_izin'],
            'status_ketidakhadiran' => $statusKet,
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'keterangan' => $validated['keterangan'] ?? "-",
        ];

        // Attach wali_kelas_id
        $kelas = Kelas::find($validated['kelas_id']);
        $data['wali_kelas_id'] = $kelas ? $kelas->wali_kelas_id : null;

        // Attach admin piket if logged in user is admin piket (safely check auth)
        $current = auth()->user();
        if ($current && $current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
        }
        // dd($data['admin_piket_id']);

        IzinSiswa::create($data);

        return redirect()->route('alpha.index')->with('success', 'Alpha siswa ditambahkan.');
    }


    public function storeBySiswa(Request $request)
    {
        $rules = [
            'tanggal_izin' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'user_id' => 'required|exists:users,id',
            'jenis_izin' => 'required|in:1,2,3',
            'keterangan' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Conditional rules
        $validator->sometimes(['jam_mulai', 'jam_selesai'], 'required|integer|min:1|max:11', function ($input) {
            return in_array($input->jenis_izin, ['1', '2']);
        });

        $validator->sometimes('jam_selesai', 'gt:jam_mulai', function ($input) {
            return in_array($input->jenis_izin, ['1', '2']);
        });

        $validator->sometimes('status_ketidakhadiran', 'required|in:1,2,3', function ($input) {
            return (string) ($input->jenis_izin ?? '') === '3';
        });

        $validated = $validator->validate();

        // If jenis_izin == 3 (Tidak Masuk Madrasah), set default jam values
        if ((int) $validated['jenis_izin'] === 3) {
            $validated['jam_mulai'] = 1;
            $validated['jam_selesai'] = 12;
        }

        // Safely get status_ketidakhadiran
        $statusKet = array_key_exists('status_ketidakhadiran', $validated)
            ? (int) $validated['status_ketidakhadiran']
            : 0;

        // Safely get jam values (use array_key_exists to avoid undefined index)
        $jamMulai = array_key_exists('jam_mulai', $validated) ? (int) $validated['jam_mulai'] : null;
        $jamSelesai = array_key_exists('jam_selesai', $validated) ? (int) $validated['jam_selesai'] : null;

        $data = [
            'tanggal_izin' => $validated['tanggal_izin'],
            'kelas_id' => $validated['kelas_id'],
            'user_id' => $validated['user_id'],
            'jenis_izin' => (int) $validated['jenis_izin'],
            'status_ketidakhadiran' => $statusKet,
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'keterangan' => $validated['keterangan'] ?? null,
        ];

        // Attach wali_kelas_id
        $kelas = Kelas::find($validated['kelas_id']);
        $data['wali_kelas_id'] = $kelas ? $kelas->wali_kelas_id : null;

        // Attach admin piket if logged in user is admin piket (safely check auth)
        $current = auth()->user();
        if ($current && $current->isAdminPiket == 1) {
            $data['admin_piket_id'] = $current->id;
        }

        IzinSiswa::create($data);

        return redirect()->route('siswa.izin.index')->with('success', 'Izin ditambahkan.');
    }


    public function update(Request $request, IzinSiswa $izinSiswa, $statusId)
    {
        $validStatusIds = [3, 4];
        if (!in_array((int) $statusId, $validStatusIds)) {
            return back()->with('error', 'Aksi tidak valid.');
        }

        $izinSiswa->status_id = (int) $statusId;
        $izinSiswa->save();

        $action = ((int) $statusId === 3) ? 'disetujui' : 'ditolak';
        $message = "Izin siswa atas nama {$izinSiswa->user->name} berhasil {$action}.";

        return back()->with('success', $message);
    }
    public function updateByWaliKelas(Request $request, IzinSiswa $izinSiswa, $statusId)
    {
        $validStatusIds = [2, 4];
        if (!in_array((int) $statusId, $validStatusIds)) {
            return back()->with('error', 'Aksi tidak valid untuk wali kelas.');
        }

        $izinSiswa->status_id = (int) $statusId;
        $izinSiswa->save();

        $action = ((int) $statusId === 2) ? 'disetujui oleh wali kelas' : 'ditolak oleh wali kelas';
        $message = "Izin siswa atas nama {$izinSiswa->user->name} berhasil {$action}.";

        return back()->with('success', $message);
    }
    public function getSiswaByKelas($kelasId)
    {
        $siswa = User::where('role_id', 3)
            ->where('kelas_id', $kelasId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return response()->json($siswa);
    }
}
