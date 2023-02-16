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

    <div>
        <a href="#tambah_akses" data-toggle="modal" class="btn btn-primary mb-3"><i data-feather="plus"></i> Tambah Data</a>
    </div>

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

    {{-- Modal Tambah Data Akses --}}
    <div class="modal fade" id="tambah_akses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Akses</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Akses:</label>
                            <input type="text" id="formGroupExampleInput" class="form-control" placeholder="Tambahkan Akses baru" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"><i data-feather="save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"><i data-feather="chevron-left"></i> Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

</div><!-- container -->


@endsection