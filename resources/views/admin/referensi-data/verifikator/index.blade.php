@extends('layouts.main')

@section('title', 'Data Verifikator')

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
                <th class="wd-25p">Jenis Verifikator</th>
                <th class="wd-5p">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($verifikator as $no => $ver)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $ver->jenis_verifikator }}</td>
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
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Data Verifikator</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.referensi-data.verifikator.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Verifikasi</label>
                            <input type="text" name="jenis_verifikator" class="form-control" placeholder="Tambahkan Status Verifikasi Baru" required>
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
    <!-- End Modal -->

     <!-- Modal Ubah Data Verifikasi -->
     @foreach ($verifikator as $ver)
     <div class="modal fade" id="ubah{{$ver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Data Verifikator</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.verifikator.update', $ver->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Verifikator</label>
                            <input type="text" autofocus value="{{ $ver->jenis_verifikator }}" name="jenis_verifikator" class="form-control" placeholder="Tambahkan Validator baru" required>
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

    <!--modal hapus data-->
    <div class="modal fade" id="hapus{{$ver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.verifikator.destroy', $ver->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <p>Apakah anda yakin? Data akan dihapus permanen.</p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"><i data-feather="save"></i> Hapus</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"><i data-feather="chevron-left"></i> Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Modal -->

</div>

@endsection