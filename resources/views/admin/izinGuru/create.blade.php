@extends('layouts.mainLayout')
@section('container')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Create Izin Guru</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-2">

          <form action="{{ route('izin-guru.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="form-group col-lg-2">
                <div class="">
                  <label for="tanggal_izin">Tanggal Izin</label>
                  <div class="input-group">
                    <input type="date" name="tanggal_izin" class="form-control" id="tanggal_izin"
                      value="{{ old('tanggal_izin', now()->toDateString()) }}">
                  </div>
                  @error('tanggal_izin') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
              </div>
              <!-- <div class="form-group col-lg-4">
                                <label for="jenis_izin">Jenis Izin</label>
                                <select name="jenis_izin" class="form-control" id="jenis_izin">
                                  <option value="">Pilih jenis</option>
                                  <option value="1" {{ old('jenis_izin') == '1' ? 'selected' : '' }}>Masuk Kelas (Terlambat)</option>
                                  <option value="2" {{ old('jenis_izin') == '2' ? 'selected' : '' }}>Meninggalkan Kelas</option>
                                  <option value="3" {{ old('jenis_izin') == '3' ? 'selected' : '' }}>Tidak Masuk Madrasah</option>
                                </select>
                                @error('jenis_izin') <div class="text-danger small">{{ $message }}</div> @enderror
                              </div> -->
              <div class="form-group col-lg-5">
                <label for="user_id">Guru Izin</label>
                <select class="form-control" id="user_id" name="user_id">
                  <option value="">Pilih Guru yang mengajukan Izin</option>
                  @foreach($guru as $g)
                    <option value="{{ $g->id }}" {{ old('user_id') == $g->id ? 'selected' : '' }}>
                      {{ $g->nama_guru ?? $g->name ?? $g->guru ?? 'Guru Pengganti ' . $g->id }}
                    </option>
                  @endforeach
                </select>
                @error('user_id') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              <div id="status_ketidakhadiran-group" class="form-group col-lg-5">
                <label for="status_ketidakhadiran">Status Ketidakhadiran</label>
                <select class="form-control" id="status_ketidakhadiran" name="status_ketidakhadiran">
                  <option value="">Pilih status ketidakhadiran</option>
                  <option value="1" {{ old('status_ketidakhadiran') == '1' ? 'selected' : '' }}>Sakit</option>
                  <option value="2" {{ old('status_ketidakhadiran') == '2' ? 'selected' : '' }}>Izin</option>
                </select>
                @error('status_ketidakhadiran') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              




            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan Ketidakhadiran</label>
                <textarea name="keterangan" class="form-control" id="keterangan"
                  rows="2">{{ old('keterangan') }}</textarea>
                @error('keterangan') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>

            <div class="row">
              <div class="form-group col-lg-3">
                <label for="kelas_id">Kelas</label>
                <select class="form-control" id="kelas_id" name="kelas_id">
                  <option value="">Pilih kelas</option>
                  @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                      {{ $k->nama_kelas ?? $k->name ?? $k->kelas ?? 'Kelas ' . $k->id }}
                    </option>
                  @endforeach
                </select>
                @error('kelas_id') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-lg-3">
                <label for="mata_pelajaran_id">Mata Pelajaran</label>
                <select class="form-control" id="mata_pelajaran_id" name="mata_pelajaran_id">
                  <option value="">Pilih Mata Pelajaran</option>
                  @foreach($mapel as $m)
                    <option value="{{ $m->id }}" {{ old('mata_pelajaran_id') == $m->id ? 'selected' : '' }}>
                      {{ $m->nama_mapel ?? $m->name ?? $m->mapel ?? 'Mata Pelajaran ' . $m->id }}
                    </option>
                  @endforeach
                </select>
                @error('mata_pelajaran_id') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              <div id="jam_mulai_group" class="form-group col-lg-3">
                <label for="jam_mulai">Mulai jam KBM ke-</label>
                <select name="jam_mulai" class="form-control" id="jam_mulai">
                  <option value="">Pilih</option>
                  @for($i = 1; $i <= 11; $i++)
                    <option value="{{ $i }}" {{ old('jam_mulai') == (string) $i ? 'selected' : '' }}>{{ $i }}</option>
                  @endfor
                </select>
                @error('jam_mulai') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>

              <div id="jam_selesai_group" class="form-group col-lg-3">
                <label for="jam_selesai">Sampai jam KBM ke-</label>
                <select name="jam_selesai" class="form-control" id="jam_selesai">
                  <option value="">Pilih</option>
                  @for($i = 1; $i <= 11; $i++)
                    <option value="{{ $i }}" {{ old('jam_selesai') == (string) $i ? 'selected' : '' }}>{{ $i }}</option>
                  @endfor
                </select>
                @error('jam_selesai') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-3">
                <label for="guru_pengganti_id">Guru Pengganti</label>
                <select class="form-control" id="guru_pengganti_id" name="guru_pengganti_id">
                  <option value="">Pilih Guru Pengganti</option>
                  @foreach($guru as $g)
                    <option value="{{ $g->id }}" {{ old('guru_pengganti_id') == $g->id ? 'selected' : '' }}>
                      {{ $g->nama_guru ?? $g->name ?? $g->guru_pengganti ?? 'Guru Pengganti ' . $g->id }}
                    </option>
                  @endforeach
                </select>
                @error('guru_pengganti_id') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>

              <div class="form-group col-lg-9">
                <label for="bentuk_tugas">Bentuk Penugasan</label>
                <textarea name="bentuk_tugas" class="form-control" id="bentuk_tugas"
                  rows="1">{{ old('bentuk_tugas') }}</textarea>
                @error('bentuk_tugas') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
            </div>
            <!-- <div class="form-group">
                              <label for="user_id">Nama</label>
                              <select class="form-control" id="user_id" name="user_id">
                                <option value="">Pilih siswa</option>
                              </select>
                              @error('user_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div> -->







            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>


          

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
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
            for a better web.
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