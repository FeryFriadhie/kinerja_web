@extends('layouts.main')

@section('title', 'Tambah Data Pegawai')

@section('content')
    
<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">@yield('title')</h4>
        </div>
    </div>

    <!-- @foreach ($datapegawai as $pega) //pake ie teu sih?   
    @endforeach -->
    <form action="{{route('admin.master-data.data-pegawai.store')}}" method="POST">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama_pegawai" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">NIK</label>
            <input type="number" class="form-control" id="inputBlocks" minlength="16" maxlength="16" name="nik" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Akses</label>
            <select class="custom-select" name="verifikator_id" id="">
                <option value="" selected>Pilih Satu</option>
                <option value="1">Member</option>
                <option value="2">Verifikator</option>
                <option value="2">Validator</option>
                <option value="3">Admin</option>
            </select>
        </div>
        {{-- <div class="form-group col-md-3">
            <label for="">NIP</label>
            <input type="number" class="form-control" id="inputBlocks" minlength="18" maxlength="18" name="nip" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">NUPTK</label>
            <input type="number" class="form-control" id="inputBlocks" minlength="16" maxlength="16" name="nuptk" required>
        </div> --}}
        {{-- <div class="form-group col-md-3">
            <label for="">No. Karpeg</label>
            <input type="number" class="form-control" minlength="6" maxlength="6" name="no_karpeg" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">No. Registrasi Guru</label>
            <input type="number" class="form-control" minlength="14" maxlength="14" name="nrg" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Jabatan Fungsional</label>
            <input type="text" class="form-control" name="jabfung" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">TMT. Jabatan Fungsional</label>
            <input type="date" class="form-control" name="tmt_jabfung" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Pangkat</label>
            <input type="text" class="form-control" name="pangkat" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Golongan</label>
            <input type="text" class="form-control" name="gol" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">TMT. Pangkat</label>
            <input type="date" class="form-control" name="tmt_pangkat" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Alamat</label>
            <textarea class="form-control" name="alamat" rows="1" required></textarea>
        </div>
        <div class="form-group col-md-3">
            <label for="">Desa</label>
            <input type="text" class="form-control" name="desa" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Kecamatan</label>
            <input type="text" class="form-control" name="kec" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Kabupaten</label>
            <input type="text" class="form-control" name="kabupaten" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Status Perkawinan</label>
            <select class="custom-select" name="" id="" required>
                <option value="" selected>Pilih Satu</option>
                <option value="1">Belum Kawin</option>
                <option value="2">Kawin</option>
                <option value="3">Cerai Hidup</option>
                <option value="3">Cerai Mati</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Jenis Kelamin</label>
            <select class="custom-select" name="jenis_kelamin" id="" required>
                <option value="" selected>Pilih Satu</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Kelamin</label>
            <input type="text" class="form-control" name="kelamin" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Pendidikan</label>
            <input type="text" class="form-control" name="pendidikan" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Pendidikan Terakhir</label>
            <input type="text" class="form-control" name="nama_pt" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Tahun Lulus</label>
            <input type="number" class="form-control" name="tahun_lulus" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Tahun Sertifikasi</label>
            <input type="number" class="form-control" name="tahun_sertifikasi" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">No. Peserta</label>
            <input type="number" class="form-control" name="no_peserta" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">No. Sertifikat</label>
            <input type="number" class="form-control" name="no_sertifikat" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Tanggal Sertifikat</label>
            <input type="date" class="form-control" name="tanggal_sertfikat" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Status Pegawai</label>
            <select class="custom-select" name="status_pegawai" id="" required>
                <option value="" selected>Pilih Satu</option>
                <option value="1">PNS</option>
                <option value="2">PPPK</option>
                <option value="3">GTY/PTY</option>
                <option value="4">GTT/PPT Provinsi</option>
                <option value="5">GTT/PTT Kab/Kota</option>
                <option value="6">Guru Bantu Pusat</option>
                <option value="7">Guru Honorer sekolah</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Masa Kerja Tahun</label>
            <input type="number" class="form-control" name="masakerjatahun" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Masa Kerja Bulan</label>
            <input type="number" class="form-control" name="masakerjabulan" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Masa Kerja Hari</label>
            <input type="number" class="form-control" name="masakerjahari" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Jenis Guru</label>
            <select class="custom-select" name="jenis_guru" id="" required>
                <option value="" selected>Pilih Satu</option>
                <option value="1">Guru Kelas</option>
                <option value="2">Guru Mata Pelajaran</option>
                <option value="3">Guru Bimbingan dan Konseling</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Tugas Mengajar</label>
            <input type="text" class="form-control" name="tugas_mengajar" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Tugas Tambahan</label>
            <input type="text" class="form-control" name="tugas_tambahan" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Unit Kerja</label>
            <input type="text" class="form-control" name="unit_kerja" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Alamat Unit Kerja</label>
            <input type="text" class="form-control" name="alm_unit_kerja" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Telepon Unit Kerja</label>
            <input type="text" class="form-control" name="tlp_unit_kerja" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">NPWP</label>
            <input type="number" class="form-control" name="npwp" minlength="16" maxlength="16" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Kartu Suami / Kartu Istri</label>
            <input type="text" class="form-control" name="kariskarsu" required>
        </div>
        <div class="form-group col-md-3">
          <label for="">Akses</label>
          <select class="custom-select" name="akses" id="">
            <option value="" selected>Pilih Satu</option>
            <option value="1">Member</option>
            <option value="2">Verifikator</option>
            <option value="2">Validator</option>
            <option value="3">Admin</option>
          </select>
        </div> --}}
      </div>

      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
      <a href="/admin/data-pegawai" type="button" class="btn btn-sm btn-warning">Kembali</a>
    </form>

</div><!-- container -->

{{-- <script>
  $('.select2').select2({
  ajax: {
    url: 'https://api.github.com/search/repositories', //ambil data dari db
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});
</script> --}}

@endsection