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

        @include('layouts.partial.flash-message')

        <div class="row mb-2">
            <div class="col-sm mb-2">
                <a href="#tambah" data-toggle="modal" class="btn btn-primary mb-3"><i data-feather="plus"></i> Tambah Data</a>
                <a href="" class="btn btn-success mb-3"><i data-feather="file-plus"></i> Export</a>
            </div>
        </div>

        <table id="example1" class="table">
            <thead>
                <tr>
                    <th class="wd-8p">No</th>
                    <th class="">Aspek</th>
                    <th class="">Aktifitas Group</th>
                    <th class="wd-8p">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group as $no => $grp)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $grp->aspek->aspek }}</td>
                        <td>{{ $grp->group_aktifitas }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#ubah{{ $grp->id }}" data-toggle="modal"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                                    <a class="dropdown-item" href="#hapus{{ $grp->id }}" data-toggle="modal"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                                </div>
                            </div> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- container -->

    <!-- modal tambah data -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Aktifitas Group</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.master-data.aktifitas-group.store') }}" method="post">
                        <div class="form-row">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Aspek</label>
                                <select class="custom-select" required name="aspek_id" id="">
                                    <option aria-readonly="true" value="">Pilih</option>
                                    @foreach ($aspek as $as)
                                    <option value="{{ $as->id }}">{{ $as->aspek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Aktifitas Group</label>
                                <input type="text" name="group_aktifitas" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary tx-13">Simpan</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    @foreach ($group as $no => $grp)
    <!-- modal ubah data -->
    <div class="modal fade" id="ubah{{$grp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Aktifitas Grup</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.master-data.aktifitas-group.update', $grp->id)}}" method="post">
                        <div class="form-row">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Aspek</label>
                                <select class="custom-select" required name="aspek_id" id="aspek_id">
                                    <option value="{{ $grp->aspek_id }}"> {{ $grp->aspek->aspek }} </option>
                                    <option value=""> Pilih </option>

                                    @foreach ($aspek as $as)
                                    <option value="{{ $as->id }}">{{ $as->aspek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Aktifitas Group</label>
                                <input type="text" value="{{$grp->group_aktifitas}}" name="group_aktifitas" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary tx-13">Ubah</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <!--modal hapus data-->

    <!--id for delete?-->
    <div class="modal fade" id="hapus{{$grp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-body">
                    <form action="{{route('admin.master-data.aktifitas-group.destroy', $grp->id)}}" method="post">
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

@endsection