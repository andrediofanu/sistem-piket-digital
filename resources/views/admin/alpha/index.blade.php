@extends('layouts.mainLayout')
@section('container')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-12">
            <a href="{{ route('izin-guru.create') }}">
                <button type="button" class="btn btn-primary">+ Tambah Siswa Alpha</button>
            </a>
        </div>
    </div>

    <style>
        /* keep table responsive but avoid page overflow; truncate long text with ellipsis */
        .table-responsive {
            overflow-x: auto;
        }

        .cell-truncate {
            max-width: 160px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cell-small {
            max-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cell-keterangan {
            max-width: 220px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* optional smaller text to fit more columns */
        .table-sm td,
        .table-sm th {
            padding: .3rem .5rem;
            font-size: .85rem;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Siswa Alpha</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">


                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th style="width:40px" class="p-2">No</th>
                                    <th style="width:110px" class="p-2">Tanggal</th>
                                    <th style="width:160px" class="p-2">Nama</th>
                                    <th style="width:110px" class="p-2">Kelas</th>
                                    <!-- <th style="width:200px" class="p-2">Jenis Izin</th> -->
                                    <th style="width:50px">Status</th>
                                    <!-- <th style="width:200px" class="p-2">Keterangan</th>
                                    <th style="width:140px">Mata Pelajaran</th>
                                    <th style="width:140px">Guru Pengganti</th>
                                    <th style="width:220px">Keterangan</th>
                                    <th style="width:140px">Wali Kelas</th> 
                                    <th style="width:140px">Dibuat</th> 
                                    <th style="width:200px" class="p-2">Status Izin</th> -->
                                    <th style="width:90px" class="p-2">Aksi</th>
                                    <!-- <th style="width:60px" class="p-2">Detail</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jenisMap = [
                                        1 => 'Masuk Kelas (Terlambat)',
                                        2 => 'Meninggalkan Kelas',
                                        3 => 'Tidak Masuk Madrasah',
                                    ];
                                    $statusKetidakharidanMap = [
                                        1 => 'Sakit',
                                        2 => 'Izin',
                                        3 => 'Alpha',
                                    ];

                                @endphp

                                @forelse($alphas as $a => $alpha)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $a + 1 }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ optional($alpha->tanggal_izin)->format('Y-m-d') ?? $alpha->tanggal_izin }}</span>
                                        </td>
                                        <td class="align-middle" title="{{ optional($alpha->user)->name ?? $alpha->nama ?? '' }}">
                                            <span
                                                class="text-primary text-xs font-weight-bold">{{ optional($alpha->user)->name ?? $alpha->nama ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ optional($alpha->kelas)->name ?? '-' }}
                                            </p>
                                            <p class="text-xs text-secondary mb-0"> Jam ke: {{ $alpha->jam_mulai }} -
                                                {{ $alpha->jam_sampai ?? $alpha->jam_selesai ?? '-' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $statusKetidakharidanMap[$alpha->status_ketidakhadiran] ?? '-' }}
                                            </p>
                                            <p class="text-xs text-secondary mb-0"> Ket: {{ $alpha->keterangan }}
                                            </p>
                                        </td>

                                        <!-- <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $statusKetidakharidanMap[$alpha->status_ketidakhadiran] ?? '-'}}
                                                    </p>

                                                </td> -->
                                        <!-- <td class="align-middle" style="width:200px; white-space:normal; word-wrap:break-word;">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $alpha->keterangan }}
                                                    </span>
                                                </td> -->
                                        <!-- <td class="align-middle" style="width:200px; white-space:normal; word-wrap:break-word;">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ optional($alpha->mataPelajaran)->name ?? $alpha->nama ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="align-middle" title="{{ optional($alpha->guru_pengganti)->name ?? $alpha->nama ?? '-' }}">
                                            <span
                                                class="text-primary text-xs font-weight-bold">{{ optional($alpha->guru_pengganti)->name ?? $alpha->nama ?? '-' }}</span>
                                        </td> -->








                                        <!-- <td class="cell-keterangan" title="{{ $alpha->keterangan ?? '' }}">{{ $alpha->keterangan ?? '-' }}</td> -->
                                        <!-- <td class="cell-truncate" title="{{ optional($alpha->waliKelas)->name ?? '' }}">{{ optional($alpha->waliKelas)->name ?? '-' }}</td> -->
                                        <!-- <td class="cell-small">{{ $alpha->created_at->format('Y-m-d H:i') }}</td> -->

                                        <!-- <td class="align-middle text-sm">
                                            @if($alpha->status_id == 1)
                                                <span
                                                    class="badge badge-sm bg-gradient-primary">{{ $alpha->statusIzinGuru->name ?? '-' }}</span>
                                            @elseif($alpha->status_id == 2)
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $alpha->statusIzinGuru->name ?? '-' }}</span>
                                            @elseif($alpha->status_id == 3)
                                                <span
                                                    class="badge badge-sm bg-gradient-danger">{{ $alpha->statusIzinGuru->name ?? '-' }}</span>
                                            @endif
                                        </td> -->
                                        <td class="align-middle text-sm">
                                            @if($alpha->status_id == 1)
                                                <div class="d-flex align-items-center gap-1">
                                                    {{-- Form for Approval (status_id = 3) --}}
                                                    <form
                                                        action="{{ route('izin-siswa.update_status', ['izinSiswa' => $alpha->id, 'statusId' => 3]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <!-- Approve Button -->
                                                        <button type="button"
                                                            class="btn btn-sm btn-success d-flex align-items-center justify-content-center m-0"
                                                            style="width:34px; height:24px;" data-bs-toggle="modal"
                                                            data-bs-target="#confirmApprove{{ $alpha->id }}">
                                                            <i class="fa-solid fa-check"></i>
                                                        </button>
                                                    </form>

                                                    {{-- Form for Rejection (status_id = 4) --}}
                                                    <form
                                                        action="{{ route('izin-siswa.update_status', ['izinSiswa' => $alpha->id, 'statusId' => 4]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger d-flex align-items-center justify-content-center m-0"
                                                            style="width:34px; height:24px;" data-bs-toggle="modal"
                                                            data-bs-target="#confirmReject{{ $alpha->id }}">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="align-middle">-</span>
                                            @endif
                                        </td>
                                        <!-- <td class="text-sm">
                                                                      <a href="" class="text-primary">Lihat Detail</a>
                                                                    </td> -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data izin guru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @foreach($alphas as $alpha)
                            <!-- Approve Modal -->
                            <div class="modal fade" id="confirmApprove{{ $alpha->id }}" tabindex="-1"
                                aria-labelledby="approveLabel{{ $alpha->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveLabel{{ $alpha->id }}">Confirm Approval</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin untuk menyetujui izin ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form
                                                action="{{ route('izin-guru.update_status', ['izinGuru' => $alpha->id, 'statusId' => 2]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Ya, Setujui</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reject Modal -->
                            <div class="modal fade" id="confirmReject{{ $alpha->id }}" tabindex="-1"
                                aria-labelledby="rejectLabel{{ $alpha->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectLabel{{ $alpha->id }}">Confirm Rejection</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin untuk menolak izin ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form
                                                action="{{ route('izin-guru.update_status', ['izinGuru' => $alpha->id, 'statusId' => 3]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Ya, Tolak Izin</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>document.write(new Date().getFullYear())</script>,
                        made by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Andre Diofanu</a>
                        , supported by MAN 1 Kota Malang.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item"><a href="https://www.creative-tim.com" class="nav-link text-muted"
                                target="_blank">Creative Tim</a></li>
                        <li class="nav-item"><a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                target="_blank">About Us</a></li>
                        <li class="nav-item"><a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                target="_blank">Blog</a></li>
                        <li class="nav-item"><a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                target="_blank">License</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


@endsection