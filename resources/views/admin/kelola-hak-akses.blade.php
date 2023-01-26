@extends('layouts.main')

@section('title', 'Kelola Hak Akses')
    
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

    <div class="row mb-3">
        <div class="col-2">
            <button class="btn btn-primary" type="submit"><i data-feather="plus"></i> Tambah Data</button>
        </div>
    </div><!-- row -->

    <table id="example1" class="table">
        <thead>
          <tr>
            <th class="wd-20p">Name</th>
            <th class="wd-25p">Position</th>
            <th class="wd-20p">Office</th>
            <th class="wd-15p">Option</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#"><i data-feather="edit"></i> Ubah</a>
                          <a class="dropdown-item" href="#"><i data-feather="trash-2"></i> Hapus</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#"><i data-feather="edit"></i> Ubah</a>
                          <a class="dropdown-item" href="#"><i data-feather="trash-2"></i> Hapus</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div><!-- container -->


@endsection