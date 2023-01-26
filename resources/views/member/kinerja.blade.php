@extends('layouts.main-member')

@section('title', 'Kinerja')
    
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

        <div class="d-flex align-items-center justify-content-between mb-1 mg-b-20 mg-lg-b-30">
            <div class="row ">
                <div class="col-lg-5 mb-3">
                    <a href="/member/form-laporan" class="btn btn-primary "><i data-feather="plus"></i> Tambah Data</a>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="search-form">
                        <input type="search" class="form-control" placeholder="Search">
                        <button class="btn" type="button"><i data-feather="search"></i></button>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
              <h5>Laporan Aktifitas</h5>
              <div class="row">
                <div class="col-4">
                    Group Aktifitas: Melaksanakan pembelajaran <br>
                    Aktifitas Usul: Melaksanakan praktikum
                </div>
                <div class="col-3">
                    <p class="tx-gray-500 m-0">26 Januari 2023</p>
                    Oleh: Oktaviani Rianti <br>
                </div>
                <div class="col-3 align-items-center">
                    <button class="btn btn-xs btn-success">Verified</button>
                    {{-- <span class="badge badge-success badge-xl">Verified</span> --}}
                </div>
                <div class="col-2">
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Detail</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
              <h5>Laporan Aktifitas</h5>
              <div class="row">
                <div class="col-4 ">
                    Group Aktifitas: Melaksanakan pembelajaran <br>
                    Aktifitas Usul: Melaksanakan praktikum
                </div>
                <div class="col-3">
                    <p class="tx-gray-500 m-0">26 Januari 2023</p>
                    Oleh: Oktaviani Rianti <br>
                </div>
                <div class="col-3">
                    <button class="btn btn-xs btn-secondary">Belum Verified</button>
                    {{-- <span class="badge badge-success badge-xl">Verified</span> --}}
                </div>
                <div class="col-2">
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Detail</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
              <h5>Laporan Aktifitas</h5>
              <div class="row">
                <div class="col-4">
                    Group Aktifitas: Melaksanakan pembelajaran <br>
                    Aktifitas Usul: Melaksanakan praktikum
                </div>
                <div class="col-3">
                    <p class="tx-gray-500 m-0">26 Januari 2023</p>
                    Oleh: Oktaviani Rianti <br>
                </div>
                <div class="col-3">
                    <button class="btn btn-xs btn-danger">Ditolak</button>
                    {{-- <span class="badge badge-success badge-xl">Verified</span> --}}
                </div>
                <div class="col-2">
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Detail</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    
    </div><!-- container -->


@endsection