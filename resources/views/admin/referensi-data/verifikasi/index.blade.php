@extends('layouts.main')

@section('title', 'Data Status Verifikasi')

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

    @include('layouts.partial.flash-message')

    <div>
        <a href="#tambah" data-toggle="modal" class="btn btn-primary mb-3"><i data-feather="plus"></i> Tambah Data</a>
    </div>

    <table id="example1" class="table">
        <thead>
            <tr>
                <th class="wd-5p">No</th>
                <th class="wd-25p">Status</th>
                <th class="wd-5p">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($verifikasi as $no => $ver)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $ver->status }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#ubah{{ $ver->id }}" data-toggle="modal"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                                <a class="dropdown-item" href="#hapus{{$ver->id}}" data-toggle="modal"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                            </div>
                        </div> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah Data Verifikasi -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Data Verifikasi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.referensi-data.verifikasi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Verifikasi</label>
                            <input type="text" id="formGroupExampleInput" name="status" class="form-control" placeholder="Tambahkan Status Verifikasi Baru" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Simpan</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah -->

    <!-- Modal ubah Data Verifikasi -->
    @foreach($verifikasi as $ver)
    <div class="modal fade" id="ubah{{$ver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Data Verifikasi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.referensi-data.verifikasi.update', $ver->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <input type="text" value="{{$ver->id}}" hidden>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Verifikasi</label>
                            <input type="text" value="{{$ver->status}}" id="formGroupExampleInput" name="status" class="form-control" placeholder="Tambahkan Verifikasi baru" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Simpan</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <!-- Modal hapus Data Verifikasi -->
    <div class="modal fade" id="hapus{{$ver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <form action="{{ route('admin.referensi-data.verifikasi.destroy', $ver->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah anda yakin? Data akan dihapus permanen.</p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Hapus</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection