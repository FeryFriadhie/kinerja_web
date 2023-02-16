@extends('layouts.main')

@section('title', 'Data Stakeholder')

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
                <th class="wd-25p">Stakeholder</th>
                <th class="wd-5p">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stakeholder as $no => $stake)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $stake->stakeholder }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#ubah{{ $stake->id }}" data-toggle="modal"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                                <a class="dropdown-item" href="#hapus{{$stake->id}}" data-toggle="modal"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                            </div>
                        </div> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal Tambah Data Stakeholder --}}
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Data Stakeholder</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.stakeholder.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Stakeholder</label>
                            <input type="text" id="formGroupExampleInput" name="stakeholder" class="form-control" placeholder="Tambahkan Stakeholder baru" required>
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
    {{-- End Modal --}}

    {{-- Modal ubah Data Stakeholder --}}
    @foreach($stakeholder as $stake)
    <div class="modal fade" id="ubah{{ $stake->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Data Stakeholder</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.stakeholder.update', $stake->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" value="{{$stake->id}}" hidden>
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="d-block">Stakeholder</label>
                            <input type="text" value="{{ $stake->stakeholder }}" id="formGroupExampleInput" name="stakeholder" class="form-control" placeholder="Tambahkan Stakeholder baru" required>
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
    {{-- End Modal --}}
    @endforeach

    {{-- Modal ubah Data Stakeholder --}}
    @foreach($stakeholder as $stake)
    <div class="modal fade" id="hapus{{ $stake->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-body">
                    <form action="{{ route('admin.referensi-data.stakeholder.destroy', $stake->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <p class="">Apakah anda yakin? Data akan dihapus permanen.</p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Hapus</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    @endforeach

</div><!-- container -->

@endsection