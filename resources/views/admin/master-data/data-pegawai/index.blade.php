@extends('layouts.main')

@section('title', 'Data Pegawai')

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

    <!-- search + add button -->
    <div class="row mb-2">
        <div class="col-sm-4">
            <div class="mb-2">
                <a href="#tambah" data-toggle="modal" class="btn btn-primary mb-2"><i data-feather="plus"></i> Tambah Data</a>
                <form action="{{ route('admin.master-data.data-pegawai.import')}}" method="POST">
                    @csrf
                <input type="file" name="file" class="form control">i
                <a href="{{ route('admin.master-data.data-pegawai.import')}}" class="btn btn-success mb-2"><i data-feather="file-plus"></i> Import</a>
                </form>
            </div>
        </div>
        <div class="col-sm-4 offset-sm-4">
            <div class="search-form mb-2">
                <input type="search" class="form-control" placeholder="Pencarian">
                <button class="btn" type="button"><i data-feather="search"></i></button>
            </div>
        </div>
    </div>

    @foreach($pegawai as $peg)
    <!-- card pegawai -->
    <div class="card mg-b-10 mg-lg-b-15">
        <div class="card-body pd-20">
          <div class="media">
            <div class="d-flex align-items-center justify-content-center">
              {{-- <i data-feather="book-open" class="tx-white-7 wd-40 ht-40"></i> --}}
              <img src="{{ url ('') }}/assets/img/profile_female.png" class="tx-white-7 wd-70 ht-65 rounded-circle" width="100%" alt="">
            </div>
            <div class="media-body pd-l-15">
              <div class="row">
                <div class="col-lg-7">
                  <p class="m-0 p-0 mb-2">
                    {{ $peg->nama_pegawai }} <br>
                    NIK {{ $peg->nik }} <br>
                    NIP {{ $peg->nip }}
                  </p>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="col-lg-3">
                        @if ($peg->verifikator->jenis_verifikator === 'Validator')
                            <span class="badge badge-pill badge-primary align-items-center">{{ $peg->verifikator->jenis_verifikator }}</span>
                        @elseif ( $peg->verifikator->jenis_verifikator === 'Verifikator')
                            <span class="badge badge-pill badge-success align-items-center">{{ $peg->verifikator->jenis_verifikator }}</span>
                        @elseif ( $peg->verifikator->jenis_verifikator === 'Member')
                            <span class="badge badge-pill badge-light align-items-center">{{ $peg->verifikator->jenis_verifikator }}</span>
                        @endif
                    </div>
                </div>
              </div>
            </div>
            <div class="d-flex">
                <div class="dropdown my-4">
                    <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" data-toggle="modal" href="#ubah{{$peg->id}}"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                        <a class="dropdown-item" data-toggle="modal" href="#hapus{{$peg->id}}"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                    </div>
                </div>
            </div>
          </div><!-- media -->
        </div>
    </div><!-- card -->
    @endforeach

    @foreach ($pegawai as $peg)
    <!--modal hapus data-->
    <div class="modal fade" id="hapus{{$peg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-body">
                    <form action="{{route('admin.referensi-data.aspek.destroy', $peg->id)}}" method="post">
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

    <!-- Modal Tambah Data Aspek -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.master-data.data-pegawai.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama_pegawai" required>
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="number" class="form-control" id="inputBlocks" minlength="16" maxlength="16" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Verifikator</label>
                            <select class="custom-select" name="verifikator_id" id="">
                                <option value="" selected>Pilih Satu</option>
                                @foreach ($verifikator as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis_verifikator }}</option>
                                @endforeach
                            </select>
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

    <!-- Modal ubah Data Stakeholder -->
    @foreach($pegawai as $peg)
    <div class="modal fade" id="ubah{{ $peg->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Data Pegawai</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.master-data.data-pegawai.update', $peg->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" value="{{ $peg->nama_pegawai }}" class="form-control" name="nama_pegawai" required>
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="number" value="{{ $peg->nik }}" class="form-control" id="inputBlocks" minlength="16" maxlength="16" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="">Akses</label>
                            <select class="custom-select" name="verifikator_id" id="">
                                <option selected value="{{ $peg->verifikator_id }}"> {{ $peg->verifikator->jenis_verifikator }} </option>
                                <option value=""> --Pilih-- </option>
                                @foreach ($verifikator as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis_verifikator }}</option>
                                @endforeach
                            </select>
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
    <!-- End Modal -->
    @endforeach

</div>
@endsection