@extends('layouts.mainLayout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Detail Izin Guru</h6>
                    <a href="{{ route('guru.izin.index') }}" class="btn btn-sm btn-secondary mb-0">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <div class="row">
                            {{-- Section 1: QR Code --}}
                            <div class="col-md-2">
                                <div class="col-12 text-center mb-2">
                                    <div class="card p-3">
                                        <h5 class="mb-3 text-primary">QR Code Izin Guru</h5>

                                        @php
                                            // 1. Get the current URL for the Izin Guru detail page
                                            $qrUrl = route('izin-guru.show', $izinGuru->id, absolute: true);

                                            // 2. Determine the size (e.g., 200 pixels)
                                            $qrSize = 200;
                                        @endphp

                                        <div class="d-flex justify-content-center">
                                            {{-- Generate QR Code as SVG --}}
                                            {{-- Make sure you have the simple-qrcode package installed --}}
                                            {!! QrCode::size($qrSize)->generate($qrUrl) !!}
                                        </div>

                                        <p class="mt-3 text-sm text-muted">Scan kode ini untuk melihat detail izin.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Section 2: Informasi Guru & Status Persetujuan --}}
                            <div class="col-md-5">
                                <h5 class="mb-3 text-primary">Informasi Guru</h5>
                                <dl class="row mb-4 detail-list">
                                    <dt class="col-sm-4 text-muted">Nama Guru</dt>
                                    <dd class="col-sm-8 font-weight-bold">
                                        {{ optional($izinGuru->user)->name ?? '-' }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">NIP</dt>
                                    <dd class="col-sm-8 font-weight-bold">
                                        {{ optional($izinGuru->user)->{'nis/nip'} ?? '-' }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">Guru Pengganti</dt>
                                    <dd class="col-sm-8 font-weight-bold">
    {{ optional($izinGuru->guru_pengganti)->name ?? '-' }}
</dd>
                                </dl>

                                <h5 class="mb-3 text-primary">Status Persetujuan</h5>
                                <dl class="row mb-4 detail-list">
                                    <dt class="col-sm-4 text-muted">Status Izin</dt>
                                    <dd class="col-sm-8">
                                        @php
                                            // Status IDs based on your Siswa example (assuming similar logic)
                                            $statusClass = [
                                                 // Dibuat
                                                1 => 'primary', // Menunggu Persetujuan
                                                2 => 'success', // Disetujui
                                                3 => 'danger',  // Ditolak
                                            ];
                                            $class = $statusClass[$izinGuru->status_id] ?? 'secondary';
                                        @endphp
                                        <span class="badge badge-sm bg-gradient-{{ $class }}">
                                            {{ optional($izinGuru->statusIzinGuru)->name ?? '-' }}
                                        </span>
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Tertanda</dt>
                                    <dd class="col-sm-8">
                                        <p class="font-weight-bold mb-0" title="">
                                            Admin Piket:
                                        </p>
                                        <p class="text-secondary mb-0">
                                            {{ optional($izinGuru->adminPiket)->name ?? '-' }}
                                        </p>
                                    </dd>
                                </dl>
                            </div>

                            {{-- Section 3: Detail Izin & Waktu Data --}}
                            <div class="col-md-5">
                                <h5 class="mb-3 text-primary">Detail Izin</h5>
                                <dl class="row mb-4 detail-list">
                                    <dt class="col-sm-4 text-muted">Tanggal Izin</dt>
                                    <dd class="col-sm-8">
                                        {{ \Carbon\Carbon::setLocale('id') }}
                                        {{ \Carbon\Carbon::parse($izinGuru->tanggal_izin)->isoFormat('dddd, D MMMM YYYY') }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Waktu Izin</dt>
                                    <dd class="col-sm-8">
                                        Jam ke-{{ $izinGuru->jam_mulai }} sampai Jam ke-{{ $izinGuru->jam_selesai }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">Status</dt>
                                    <dd class="col-sm-8 ">
                                        @php
                                            $statusKetidakhadiranMap = [
                                                '1' => 'Sakit',
                                                '2' => 'Izin',
                                            ];
                                        @endphp
                                        {{ $statusKetidakhadiranMap[$izinGuru->status_ketidakhadiran] ?? $izinGuru->status_ketidakhadiran ?? '-' }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">Keterangan Izin</dt>
                                    <dd class="col-sm-8">
                                        <p class="mb-0">{{ $izinGuru->keterangan }}</p>
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Kelas</dt>
                                    <dd class="col-sm-8">
                                        {{ optional($izinGuru->kelas)->name ?? '-' }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Mata Pelajaran</dt>
                                    <dd class="col-sm-8">
                                        {{ optional($izinGuru->mataPelajaran)->name ?? '-' }}
                                    </dd>

                                    

                                    <dt class="col-sm-4 text-muted">Detail Tugas</dt>
                                    <dd class="col-sm-8">
                                        <p class="mb-0">{{ $izinGuru->bentuk_tugas }}</p>
                                    </dd>

                                    
                                    
                                </dl>

                                <h5 class="mb-3 text-primary">Waktu Data</h5>
                                <dl class="row detail-list">
                                    <dt class="col-sm-4 text-muted">Dibuat Pada</dt>
                                    <dd class="col-sm-8">
                                        {{ $izinGuru->created_at->isoFormat('D MMMM YYYY, HH:mm') }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Terakhir Diperbarui</dt>
                                    <dd class="col-sm-8">
                                        {{ $izinGuru->updated_at->isoFormat('D MMMM YYYY, HH:mm') }}
                                    </dd>
                                </dl>
                            </div>

                        </div>

                        <hr class="my-4">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        /* Styling for the detail list for better readability */
        .detail-list dd {
            margin-bottom: 0.5rem;
        }

        .detail-list dt {
            font-weight: 600;
        }
    </style>
@endpush