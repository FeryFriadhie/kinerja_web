@extends('layouts.main-member')

@section('title', 'Form Laporan Kinerja')

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
            <h4 class="mg-b-0 tx-spacing--1">Form Laporan</h4>
        </div>
    </div>

    <form>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Aspek</label>
          <select class="custom-select" required>
            <option value="" selected>Choose one</option>
            <option value="1">UTAMA (4M)</option>
            <option value="2">TAMBAHAN (1M)</option>
            <option value="3">UTAMA (SETARA 4M) Kepsek</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Group Aktifitas</label>
          {{-- <div class="parsley-select wd-600"> --}}
            <select class="custom-select" required>
              <option value="" selected>Choose one</option>
              <option value="1">Melaksanakan pembelajaran</option>
              <option value="2">Melaksanakan tugas tambahan</option>
            </select>
          {{-- </div> --}}
        </div>
        <div class="form-group col-md-4">
          <label for="inputAddress">Aktifitas Usul</label>
          {{-- <div class="parsley-select wd-600"> --}}
            <select class="custom-select" required>
              <option value="" selected>Choose one</option>
              <option value="1">Melaksanakan proses bimbingan</option>
              <option value="2">Melaksanakan praktikum</option>
              <option value="3">Melaksanakan pembimbingan siswa Magang Industri</option>
              <option value="4">Membuat kesepakatn Kelas</option>
              <option value="5">Melaksanakan coaching dengan rekan sejawat</option>
            </select>
          {{-- </div> --}}
        </div>
        <div class="form-group col-md-3">
          <label for="inputAddress2">Stakeholder</label>
          {{-- <div class="parsley-select wd-600"> --}}
            <select class="custom-select" required>
              <option value="" selected>Choose one</option>
              <option value="1">Kepala Sekolah</option>
              <option value="2">Wakasek</option>
              <option value="3">Semua guru, Wakasek, Kepala sekolah</option>
              <option value="4">Guru BK, Guru TIK</option>
              <option value="5">Semua Guru</option>
              <option value="5">dSatu Untuk SEMUA.</option>
            </select>
          {{-- </div> --}}
        </div>
        <div class="form-group col-md-2">
          <label>Jumlah</label>
          <input type="number" placeholder="Menit Aktifitas" class="form-control" name="" id="">
        </div>
        <div class="form-group col-md-4">
          <label for="">Bukti Foto</label>
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>
        <div class="form-group col-md-4 ">
          <label for="">Bukti Dokumen</label>
          <input type="file" class="form-control" id="inputGroupFile01">
        </div>
      </div>

      <div class="form-row">
        
        <div class="form-group col-md-2">
          <label for="">Verifikator</label>
          <input type="text" class="form-control" name="" readonly value="verifikator" id="">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div><!-- container -->

@endsection