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
            <a href="{{ route('alpha-siswa.create') }}">
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


                        <table class="table align-items-center mb-0 w-100">
                            <thead>
                                <tr>
                                    <th style="width:40px" class="p-2">No</th>
                                    <th style="width:110px" class="p-2">Tanggal</th>
                                    <th style="width:160px" class="p-2">Nama</th>
                                    <th style="width:110px" class="p-2">Kelas</th>
                                    <th style="width:50px">Status</th>
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
                                            <!-- <p class="text-xs text-secondary mb-0"> Jam ke: {{ $alpha->jam_mulai }} -
                                                {{ $alpha->jam_sampai ?? $alpha->jam_selesai ?? '-' }} -->
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $statusKetidakharidanMap[$alpha->status_ketidakhadiran] ?? '-' }}
                                            </p>
                                            <p class="text-xs text-secondary mb-0"> Ket: {{ $alpha->keterangan }}
                                            </p>
                                        </td>
                                        <!-- <td class="align-middle text-sm">
                                            Td AKsi
                                        </td> -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data izin guru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        

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