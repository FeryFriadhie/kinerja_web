@extends('layouts.main')

@section('title', 'Validasi Laporan')
    
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
            <div class="d-none d-md-block">
                <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase"><i data-feather="check-circle" class="mr-1"></i> Validasi Semua</button>
            </div>
        </div>

        @include('layouts.partial.flash-message')

        {{-- <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
            <div class="row mb-2">
                <div class="col-lg-4">
                    <div class="search-form ">
                        <input typtypee="search" class="form-control" placeholder="Search">
                        <button class="btn" type="button"><i data-feather="search"></i></button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- search + add button -->
        <div class="row row-xs mb-3">
            <div class="col-lg-4 mb-2">
                <select class="custom-select form-control" name="cari">
                    <option value="" selected>Pilih Verifikator</option>
                    <option value="">Verifikator 1</option>
                </select>   
            </div>
            <div class="col-lg-4 mb-2">
                <select class="custom-select form-control" name="cari">
                    <option value="" selected>Pilih Guru</option>
                    <option value="">Guru</option>
                </select>   
            </div>
            <div class="mb-2 d-block">
                <button class="btn btn-sm pd-x-15 p-2 btn-success btn-uppercase"><i data-feather="filter" class="mr-1"></i> Filter</button>
            </div>
        </div>
        
        {{-- <div class="card mb-2">
            <div class="card-body">
              <h5>Laporan Aktifitas</h5>
              <div class="row">
                <div class="col-5">
                    Group Aktifitas: Melaksanakan pembelajaran <br>
                    Aktifitas Usul: Melaksanakan praktikum
                </div>
                <div class="col-3">
                    <p class="tx-gray-500 m-0">26 Januari 2023</p>
                    Oleh: Oktaviani Rianti <br>
                </div>
                <div class="col-1">
                    <a href="" data-bs-toggle="tooltip" data-placement="top" title="Telah di Validasi"><i data-feather="check-circle"></i></a>
                </div>
                <div class="col-1">
                    <a href="" data-bs-toggle="tooltip" data-placement="top" title="Ditolak"><i data-feather="minus-circle"></i></a>
                </div>
              </div>
            </div>
        </div> --}}
    
        @foreach($kinerja as $det)
        <div class="card mb-1">
            <div class="card-body">
            <h5>Laporan Aktifitas</h5>
              
            <div class="row">
                <div class="col-lg-6">
                    <p class="m-0 p-0">
                        <table>
                            <tr>
                                <td width="20%">Group</td>
                                <td class="px-2">:</td>
                                <td>{{ $det->group->group_aktifitas }}</td>
                            </tr>
                            <tr>
                                <td> Usulan</td>
                                <td class="px-2">:</td>
                                <td>{{ $det->usulan->aktifitas_usulan }}</td>
                            </tr>
                        </table>
                    </p>
                </div>
                <div class="col-lg-4">
                    <p class="tx-gray-500 m-0 ">{{ $det->tanggal }}</p>
                    <p data-bs-toggle="tooltip" data-placement="top" title="">
                        <i class="fas fa-user fa-sm pr-2 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Member"></i> {{$det->hReport->pegawai->nama_pegawai ?? ''}} <br>
                        <i class="fas fa-user-check fa-sm pr-2 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Verifikator"></i> {{$det->hReport->pegVerifikator->pegawai->nama_pegawai ?? ''}}
                    </p>
                </div>
                <div class="col-lg-2">

                    @if($det->verifikasi->status === 'Verified' ?? '')
                        <form action="{{ route('validator.validasi-laporan.update', $det->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <p><button type="submit" name="verifikasi_id" value="5" class="text-secondary px-2 m-0" style="background: none; border: none;"
                                data-bs-toggle="tooltip" data-placement="top" title="Validasi Laporan">
                                <i data-feather="check-circle" ></i>
                            </button></p>
                        </form>
                        <a href="#" class="my-2 text-secondary icon-status px-2" data-bs-toggle="tooltip" data-placement="top" title="Detail Laporan">
                            <i data-feather="info"></i>
                        </a>
                        
                    @elseif($det->verifikasi->status === 'Valid' ?? '')
                        <p  class="my-2 text-primary icon-status px-2" data-bs-toggle="tooltip" data-placement="top" title="Laporan Valid">
                            <i data-feather="check-circle"></i>
                        </p>
                        <a href="#" class="my-2 text-secondary icon-status px-2" data-bs-toggle="tooltip" data-placement="top" title="Detail Laporan">
                            <i data-feather="info"></i>
                        </a>
                    @endif
                    
                </div>
              </div>
            </div>
        </div>
        @endforeach

        <!-- pagination -->
        {!! $kinerja->withQueryString()->links('pagination::bootstrap-5') !!}

    </div><!-- container -->


@endsection