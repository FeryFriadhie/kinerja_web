@extends('layouts.main')

@section('title', 'Aktifitas Group')

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

        <div>
            <a href="" class="btn btn-primary mb-3"><i data-feather="plus"></i> Tambah Data</a>
        </div>

        <table id="example1" class="table">
            <thead>
              <tr>
                <th class="wd-10p">Aspek</th>
                <th class="wd-25p">Aktifitas Group</th>
                <th class="wd-10p">Opsi</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>UTAMA (4M)</td>
                    <td>Melaksanakan Pembelajaran</td>
                    <td>
                        <div class="dropdown">
                            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"><i class="far fa-edit fa-sm"></i> Ubah</a>
                              <a class="dropdown-item" href="#"><i class="far fa-trash-alt fa-sm"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>UTAMA (4M)</td>
                    <td>Melaksanakan tugas tambahan</td>
                    <td>
                        <div class="dropdown">
                            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"><i class="far fa-edit fa-sm"></i> Ubah</a>
                              <a class="dropdown-item" href="#"><i class="far fa-trash-alt fa-sm"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div><!-- container -->

@endsection