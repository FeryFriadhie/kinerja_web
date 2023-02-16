@extends('layouts.main')

@section('title', 'Laporan')
    
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

    <div class="row mb-2">
        <div class="col-sm-3 mb-3">
            <input type="text" id="dateFrom" class="form-control" placeholder="Dari tanggal">
        </div>
        <div class="col-sm-3 mb-3">
            <input type="text" id="dateTo" class="form-control" placeholder="Sampai tanggal">
        </div>
        <div class="col-sm mb-2">
            <button class="btn btn-primary mb-2" type="submit"><i data-feather="filter"></i> Filter</button>
            <button class="btn btn-success mb-2" type="submit"><i data-feather="printer"></i> Cetak</button> 
        </div>
    </div>

    <table id="example1" class="table">
        <thead>
          <tr>
            <th class="wd-5p">No</th>
            <th class="wd-20p">Pegawai</th>
            <th class="wd-15p">Bulan</th>
            <th class="wd-10p">Tahun</th>
            <th class="wd-20p">Verifikator</th>
            <th class="wd-20p">Validator</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Oktaviani Rianti</td>
                <td>Januari</td>
                <td>2022</td>
                <td>Aldita Septinasari</td>
                <td>Kepala Sekolah</td>
            </tr>
        </tbody>
    </table>

</div><!-- container -->


@endsection