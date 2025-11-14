@extends('layouts.mainLayout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Detail Izin Siswa</h6>
                    <a href="{{ route('izin-siswa.index') }}" class="btn btn-sm btn-secondary mb-0">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="col-12 text-center mb-2">
                                    <div class="card p-3">
                                        <h5 class="mb-3 text-primary">QR Code Izin Siswa</h5>

                                        @php
                                            // 1. Get the current URL for the Izin Siswa detail page
                                            $qrUrl = route('siswa.izin.show', $izinSiswa->id, absolute: true);

                                            // 2. Determine the size (e.g., 200 pixels)
                                            $qrSize = 200;
                                        @endphp

                                        <div class="d-flex justify-content-center">
                                            {{-- Generate QR Code as SVG --}}
                                            {!! QrCode::size($qrSize)->generate($qrUrl) !!}
                                        </div>

                                        <p class="mt-3 text-sm text-muted">Scan kode ini untuk melihat detail izin.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h5 class="mb-3 text-primary">Informasi Siswa</h5>
                                <dl class="row mb-4 detail-list">
                                    <dt class="col-sm-4 text-muted">Nama Siswa</dt>
                                    <dd class="col-sm-8 font-weight-bold">
                                        {{ optional($izinSiswa->user)->name ?? $izinSiswa->nama ?? '-' }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">NIS</dt>
                                    <dd class="col-sm-8 font-weight-bold">


                                        {{ $izinSiswa->user->{'nis/nip'} ?? '-' }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Kelas</dt>
                                    <dd class="col-sm-8">
                                        {{ optional($izinSiswa->kelas)->name ?? '-' }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Wali Kelas</dt>
                                    <dd class="col-sm-8">
                                        {{ optional($izinSiswa->waliKelas)->name ?? '-' }}
                                    </dd>
                                </dl>

                                <h5 class="mb-3 text-primary">Status Persetujuan</h5>
                                <dl class="row mb-4 detail-list">
                                    <dt class="col-sm-4 text-muted">Status Izin</dt>
                                    <dd class="col-sm-8">
                                        @php
                                            $statusClass = [
                                                1 => 'secondary', // Dibuat
                                                2 => 'primary', // Menunggu Persetujuan
                                                3 => 'success', // Disetujui
                                                4 => 'danger',  // Ditolak
                                            ];
                                            $class = $statusClass[$izinSiswa->status_id] ?? 'secondary';
                                        @endphp
                                        <span class="badge badge-sm bg-gradient-{{ $class }}">
                                            {{ optional($izinSiswa->statusIzinSiswa)->name ?? '-' }}
                                        </span>
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Tertanda</dt>
                                    <dd class="col-sm-8">
                                        <p class="font-weight-bold mb-0" title="">
                                            Admin Piket:
                                        </p>
                                        <p class="text-secondary mb-0"> {{ optional($izinSiswa->adminPiket)->name ?? '-' }}
                                        </p>
                                        <p class="font-weight-bold mb-0" title="">
                                            Wali Kelas:
                                        </p>
                                        <p class="text-secondary mb-0"> {{ optional($izinSiswa->waliKelas)->name ?? '-' }}
                                        </p>

                                    </dd>
                                </dl>
                            </div>

                            <div class="col-md-5">
                                <h5 class="mb-3 text-primary">Detail Izin</h5>
                                <dl class="row mb-4 detail-list">
                                    <dt class="col-sm-4 text-muted">Tanggal Izin</dt>
                                    <dd class="col-sm-8">
                                        {{ \Carbon\Carbon::setLocale('id') }}
                                        {{ \Carbon\Carbon::parse($izinSiswa->tanggal_izin)->isoFormat('dddd, D MMMM YYYY') }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Jenis Izin</dt>
                                    <dd class="col-sm-8 font-weight-bold">
                                        @php
                                            $jenisMap = [
                                                1 => 'Masuk Kelas (Terlambat)',
                                                2 => 'Meninggalkan Kelas',
                                                3 => 'Tidak Masuk Madrasah',
                                            ];
                                        @endphp
                                        {{ $jenisMap[$izinSiswa->jenis_izin] ?? $izinSiswa->jenis_izin }}
                                    </dd>

                                    @if ($izinSiswa->jenis_izin == 1 || $izinSiswa->jenis_izin == 2)
                                        <dt class="col-sm-4 text-muted">Jam Izin</dt>
                                        <dd class="col-sm-8">
                                            Jam ke-{{ $izinSiswa->jam_mulai }} sampai Jam
                                            ke-{{ $izinSiswa->jam_selesai ?? $izinSiswa->jam_sampai ?? '-' }}
                                        </dd>
                                    @elseif($izinSiswa->jenis_izin == 3)
                                        <dt class="col-sm-4 text-muted">Status</dt>
                                        <dd class="col-sm-8">
                                            @php
                                                $statusKetidakharidanMap = [
                                                    1 => 'Sakit',
                                                    2 => 'Izin',
                                                    3 => 'Alpha',
                                                ];
                                            @endphp
                                            {{ $statusKetidakharidanMap[$izinSiswa->status_ketidakhadiran] ?? '-'}}
                                        </dd>
                                    @endif

                                    <dt class="col-sm-4 text-muted">Keterangan</dt>
                                    <dd class="col-sm-8">
                                        <p class="mb-0">{{ $izinSiswa->keterangan }}</p>
                                    </dd>
                                </dl>

                                <h5 class="mb-3 text-primary">Waktu Data</h5>
                                <dl class="row detail-list">
                                    <dt class="col-sm-4 text-muted">Dibuat Pada</dt>
                                    <dd class="col-sm-8">
                                        {{ $izinSiswa->created_at->isoFormat('D MMMM YYYY, HH:mm') }}
                                    </dd>

                                    <dt class="col-sm-4 text-muted">Terakhir Diperbarui</dt>
                                    <dd class="col-sm-8">
                                        {{ $izinSiswa->updated_at->isoFormat('D MMMM YYYY, HH:mm') }}
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