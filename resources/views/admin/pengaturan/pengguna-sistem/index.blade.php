@extends('layouts.main')

@section('title', 'Pengguna Sistem')

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
        <div class="col-3">
            <button class="btn btn-primary" type="submit"><i data-feather="plus"></i> Tambah Data</button>
        </div>
    </div><!-- row -->

    <table id="example1" class="table">
        <thead>
            <tr>
                <th class="wd-5p">No</th>
                <th class="wd-25p">Akses</th>
                <th class="wd-5p">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Administrator</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                            <a class="dropdown-item" href="#"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Verifikator</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                            <a class="dropdown-item" href="#"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Validator</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                            <a class="dropdown-item" href="#"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Member</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                            <a class="dropdown-item" href="#"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div><!-- container -->

@endsection