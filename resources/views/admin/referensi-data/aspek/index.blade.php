@extends('layouts.main')

@section('title', 'Data Aspek')

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
                <th class="wd-25p">Aspek</th>
                <th class="wd-5p">Opsi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($aspek as $no => $aspe)
            <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $aspe->aspek }}</td>
                <td>
                    <div class="dropdown">
                        <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="more-vertical"> </i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#ubah{{ $aspe->id }}" data-toggle="modal"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                            <a class="dropdown-item" href="#hapus{{$aspe->id}}" data-toggle="modal"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Hapus</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah Data Aspek -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Data Aspek</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.aspek.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Aspek</label>
                            <input type="text" id="formGroupExampleInput" name="aspek" class="form-control" placeholder="Tambahkan aspek baru" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Simpan</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal ubah Data Stakeholder -->
    @foreach($aspek as $aspe)
    <div class="modal fade" id="ubah{{ $aspe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Data Aspek</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.aspek.update', $aspe->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" value="{{$aspe->id}}" hidden>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Aspek</label>
                            <input type="text" value="{{ $aspe->aspek }}" id="formGroupExampleInput"  name="aspek" class="form-control" placeholder="Tambahkan aspek baru" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Simpan</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @endforeach

    @foreach ($aspek as $as)
    <!--modal hapus data-->
    <div class="modal fade" id="hapus{{$as->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-body">
                    <form action="{{route('admin.referensi-data.aspek.destroy', $as->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <h6 class="p-3">Apakah anda yakin? Data akan dihapus permanen.</h6>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Hapus</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div><!-- container -->

@endsection