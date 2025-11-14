@extends('layouts.mainLayout')
@section('container')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Create</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-2">

          <form action="{{ route('siswa.izin.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="form-group col-lg-4">
                <div class="">
                  <label for="tanggal_izin">Tanggal Izin</label>
                  <div class="input-group">
                    <input type="date" name="tanggal_izin" class="form-control" id="tanggal_izin"
                      value="{{ old('tanggal_izin', now()->toDateString()) }}">
                  </div>
                  @error('tanggal_izin') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
              </div>
              <div class="form-group col-lg-4">
                <label for="jenis_izin">Jenis Izin</label>
                <select name="jenis_izin" class="form-control" id="jenis_izin">
                  <option value="">Pilih jenis</option>
                  <option value="1" {{ old('jenis_izin') == '1' ? 'selected' : '' }}>Masuk Kelas (Terlambat)</option>
                  <option value="2" {{ old('jenis_izin') == '2' ? 'selected' : '' }}>Meninggalkan Kelas</option>
                  <option value="3" {{ old('jenis_izin') == '3' ? 'selected' : '' }}>Tidak Masuk Madrasah</option>
                </select>
                @error('jenis_izin') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              <div id="status_ketidakhadiran-group"
                class="form-group {{ old('jenis_izin') == '3' ? '' : 'd-none' }} col-lg-4">
                <label for="status_ketidakhadiran">Status Ketidakhadiran</label>
                <select class="form-control" id="status_ketidakhadiran" name="status_ketidakhadiran">
                  <option value="">Pilih status ketidakhadiran</option>
                  <option value="1" {{ old('status_ketidakhadiran') == '1' ? 'selected' : '' }}>Sakit</option>
                  <option value="2" {{ old('status_ketidakhadiran') == '2' ? 'selected' : '' }}>Izin</option>
                </select>
                @error('status_ketidakhadiran') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>


              <div id="jam_mulai_group" class="form-group col-lg-2">
                <label for="jam_mulai">Mulai jam KBM ke-</label>
                <select name="jam_mulai" class="form-control" id="jam_mulai">
                  <option value="">Pilih</option>
                  @for($i = 1; $i <= 11; $i++)
                    <option value="{{ $i }}" {{ old('jam_mulai') == (string) $i ? 'selected' : '' }}>{{ $i }}</option>
                  @endfor
                </select>
                @error('jam_mulai') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>

              <div id="jam_selesai_group" class="form-group col-lg-2">
                <label for="jam_selesai">Sampai jam KBM ke-</label>
                <select name="jam_selesai" class="form-control" id="jam_selesai">
                  <option value="">Pilih</option>
                  @for($i = 1; $i <= 11; $i++)
                    <option value="{{ $i }}" {{ old('jam_selesai') == (string) $i ? 'selected' : '' }}>{{ $i }}</option>
                  @endfor
                </select>
                @error('jam_selesai') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              <div id="jam_terlambat" class="form-group col-lg-4">
                <label for="jam_mulai">Masuk jam KBM ke-</label>
                <select name="jam_mulai" class="form-control" id="jam_mulai">
                  <option value="">Pilih</option>
                  @for($i = 1; $i <= 11; $i++)
                    <option value="{{ $i }}" {{ old('jam_mulai') == (string) $i ? 'selected' : '' }}>{{ $i }}</option>
                  @endfor
                </select>
                @error('jam_mulai') <div class="text-danger small">{{ $message }}</div> @enderror
              </div>
              


            </div>


            <div class="form-group">
              <label for="kelas_id">Kelas</label>
              @foreach($kelas as $k)
                <!-- visible (user sees class name) -->
                <input type="text" class="form-control mb-2"
                  value="{{ $k->nama_kelas ?? $k->name ?? $k->kelas ?? 'Kelas ' . $k->id }}" disabled>

                <!-- hidden (actual value submitted) -->
                <input type="hidden" name="kelas_id" value="{{ $k->id }}">
              @endforeach
              @error('kelas_id') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>


            <div class="form-group">
              <label for="user_id">Nama</label>
              @foreach($siswa as $s)
                <!-- visible (user sees name) -->
                <input type="text" class="form-control mb-2" value="{{ $s->name ?? 'Siswa ' . $s->id }}" disabled>

                <!-- hidden (actual value submitted) -->
                <input type="hidden" name="user_id" value="{{ $s->id }}">
              @endforeach
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
              const jenis = document.getElementById('jenis_izin');
              const statusGroup = document.getElementById('status_ketidakhadiran-group');

              // Original Jam Groups (used for value '2')
              const jamGroup1 = document.getElementById('jam_mulai_group');
              const jamGroup2 = document.getElementById('jam_selesai_group');

              // New Group for value '1'
              const jamTerlambat = document.getElementById('jam_terlambat'); // 👈 NEW ELEMENT

              function toggleStatus() {
                // 1. Safety check for all elements
                if (!jenis || !statusGroup || !jamGroup1 || !jamGroup2 || !jamTerlambat) return;

                const jenisValue = jenis.value;

                // --- 2. Logic for 'status_ketidakhadiran-group' (Value '3') ---
                if (jenisValue === '3') {
                  statusGroup.classList.remove('d-none');

                  // Hide all Jam groups
                  jamTerlambat.classList.add('d-none');
                  jamGroup1.classList.add('d-none');
                  jamGroup2.classList.add('d-none');

                } else {
                  statusGroup.classList.add('d-none');
                  statusGroup.querySelectorAll('select, input, textarea').forEach(el => el.value = '');

                  // --- 3. Logic for Jam Groups (Values '1' and '2') ---
                  if (jenisValue === '1') {
                    // Show Jam Terlambat ONLY
                    jamTerlambat.classList.remove('d-none');

                    // Hide the other two jam groups
                    jamGroup1.classList.add('d-none');
                    jamGroup2.classList.add('d-none');
                    jamGroup1.querySelectorAll('select, input, textarea').forEach(el => el.value = '');
                    jamGroup2.querySelectorAll('select, input, textarea').forEach(el => el.value = '');

                  } else if (jenisValue === '2') {
                    // Show Jam Mulai and Jam Selesai ONLY
                    jamGroup1.classList.remove('d-none');
                    jamGroup2.classList.remove('d-none');

                    // Hide Jam Terlambat
                    jamTerlambat.classList.add('d-none');
                    jamTerlambat.querySelectorAll('select, input, textarea').forEach(el => el.value = '');

                  } else {
                    // Hide all Jam Groups when value is '0', '4', etc.
                    jamTerlambat.classList.add('d-none');
                    jamGroup1.classList.add('d-none');
                    jamGroup2.classList.add('d-none');
                    jamTerlambat.querySelectorAll('select, input, textarea').forEach(el => el.value = '');
                    jamGroup1.querySelectorAll('select, input, textarea').forEach(el => el.value = '');
                    jamGroup2.querySelectorAll('select, input, textarea').forEach(el => el.value = '');
                  }
                }
              }

              if (jenis) {
                jenis.addEventListener('change', toggleStatus);
                toggleStatus(); // Run on initial load
              }
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