@extends('layouts.mainLayout')
@section('container')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Create Alpha Siswa</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-2">

          <form action="{{ route('alpha-siswa.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="form-group col-lg-4">
                <div class="">
                  <label for="tanggal_izin">Tanggal</label>
                  <div class="input-group">
                    <input type="date" name="tanggal_izin" class="form-control" id="tanggal_izin"
                      value="{{ old('tanggal_izin', now()->toDateString()) }}">
                  </div>
                  @error('tanggal_izin') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
              </div>
              <div class="form-group col-lg-4">
                <label for="jenis_izin">Jenis Izin</label>

                <select class="form-control" id="jenis_izin_display" disabled>
                  <option value="3" selected>Tidak Masuk Madrasah</option>
                </select>

                <input type="hidden" name="jenis_izin" value="3">

                @error('jenis_izin') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              <div id="status_ketidakhadiran-group" class="form-group col-lg-4">
                <label for="status_ketidakhadiran_display">Status Ketidakhadiran</label>

                <select class="form-control" id="status_ketidakhadiran_display" disabled>
                  <option value="3" selected>Alpha</option>
                </select>

                <input type="hidden" name="status_ketidakhadiran"  value="3">

                @error('status_ketidakhadiran') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>





            </div>


            <div class="form-group">
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

            <div class="form-group">
              <label for="user_id">Nama</label>
              <select class="form-control" id="user_id" name="user_id">
                <option value="">Pilih siswa</option>
              </select>
              @error('user_id') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>





            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" class="form-control" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
              @error('keterangan') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>


          <script>
            document.addEventListener('DOMContentLoaded', function () {
              const kelasSelect = document.getElementById('kelas_id');
              const siswaSelect = document.getElementById('user_id');

              if (!kelasSelect || !siswaSelect) return;

              kelasSelect.addEventListener('change', function () {
                const kelasId = this.value;
                siswaSelect.innerHTML = '<option value="">Memuat...</option>';

                if (kelasId) {
                  fetch(`/admin-piket/get-siswa-by-kelas/${kelasId}`)
                    .then(response => response.json())
                    .then(data => {
                      siswaSelect.innerHTML = '<option value="">Pilih siswa</option>';
                      data.forEach(siswa => {
                        const option = document.createElement('option');
                        option.value = siswa.id;
                        option.textContent = siswa.name;
                        siswaSelect.appendChild(option);
                      });
                    })
                    .catch(error => {
                      console.error(error);
                      siswaSelect.innerHTML = '<option value="">Gagal memuat siswa</option>';
                    });
                } else {
                  siswaSelect.innerHTML = '<option value="">Pilih siswa</option>';
                }
              });
            });
          </script>

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