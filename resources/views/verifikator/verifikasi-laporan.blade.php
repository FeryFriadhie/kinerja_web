@extends('layouts.main')

@section('title', 'Verifikasi Laporan')
    
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
        <form action="/verifikator/verifikasi-laporan" method="get">
            <div class="row row-xs mb-3">
                <div class="col-lg-4 mb-2">
                    <select class="form-select custom-select" id="cari_guru" name="guru" data-bs-toggle="tooltip" data-placement="top" title="Cari Guru">
                        <option value="" selected>Pilih Guru</option>
                        @foreach ($pegawai as $id => $peg)
                        <option value="{{ $peg->id_pegawai ?? ''}}">{{ $peg->nama_pegawai ?? ''}}</option> 
                        @endforeach 
                    </select>   
                </div>
                <div class="col-lg-4 mb-2">
                    <select class="custom-select form-control" id="cari_status" name="status" data-bs-toggle="tooltip" data-placement="top" title="Cari berdasarkan status">
                        <option value="" selected>Pilih Status</option>
                        @foreach ($verifikasi as $item)
                        <option value="{{ $item->id ?? ''}}">{{ $item->status ?? ''}}</option>
                        @endforeach
                    </select>   
                </div>
                <div class="mb-2 d-block">
                    <button class="btn btn-sm pd-x-15 p-2 btn-success btn-uppercase" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Filter Laporan"><i data-feather="filter" class="mr-1"></i> Filter</button>
                </div>
                <div class="mb-2 d-block">
                    <a href="/verifikator/verifikasi-laporan" class="btn btn-sm pd-x-15 p-2 btn-light btn-uppercase" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Refresh Halaman"><i data-feather="refresh-cw" class="mr-1"></i></a>
                </div>
            </div>
        </form>
        
        <!-- list laporan -->
        @if (!$kinerja->isEmpty())
        <div id="accordion1" class="accordion mb-1">
            @foreach ($kinerja as $det)
                <h6 class="accordion-title">
                    <div class="row">
                        <div class="col-lg-5">
                            <h6 class=" p-0 m-0 mb-1">Laporan Aktifitas</h6>
                        </div>
                        <div class="col-lg-3">
                            <p class="p-0 m-0 p-1 mb-1 text-secondary">{{$det->tanggal ?? ''}}</p> <!--tgl diverifikasi/divalidasi-->
                        </div>
                        <div class="col-lg-3">
                            <p class="p-0 m-0 p-1 mb-1 text-secondary">{{ $det->pegawai->nama_pegawai ?? ''}}</p>
                        </div>
                        <div class="col-lg-1">
                            @if ($det->verifikasi->status === 'Verified')
                                <p class="px-2 m-0 text-success" data-bs-toggle="tooltip" data-placement="top" title="Verified">
                                    <i data-feather="check-circle" ></i>
                                </p>
                            @elseif($det->verifikasi->status === 'Belum Verified')
                                <p class="px-2 m-0 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Belum Verified">
                                    <i data-feather="minus-circle" ></i>
                                </p>
                            @elseif($det->verifikasi->status === 'Ditolak')
                                <p class="px-2 m-0 text-danger" data-bs-toggle="tooltip" data-placement="top" title="Ditolak">
                                    <i data-feather="x-circle" ></i>
                                </p>
                            @elseif($det->verifikasi->status === 'Koreksi')
                                <p class="px-2 m-0 text-warning" data-bs-toggle="tooltip" data-placement="top" title="Laporan perlu dikoreksi">
                                    <i data-feather="alert-circle" ></i>
                                </p>
                            @endif
                        </div>
                    </div>
                </h6>
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <p class="m-0 p-0">
                                <table>
                                    <tr>
                                        <td>Stakeholder</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->stakeholder->stakeholder ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Aspek</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->aspek->aspek ?? '' }}</td> 
                                    </tr>
                                    <tr>
                                        <td width="20%">Aktifitas Group</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->group->group_aktifitas ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Aktifitas Usulan</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->usulan->aktifitas_usulan ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>Output dan Menit</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->usulan->output ?? null}} ({{$det->jumlah ?? null}} Menit)</td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Dokumen</td>
                                        <td class="px-1">:</td>
                                        @if($det->bukti_dokumen)
                                            {{-- @foreach ($det->bukti_dokumen as $doc) 
                                            <td>
                                                <a href="{{route('view.doc', str_replace('.','&',$doc))}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a>
                                            </td>
                                            @endforeach --}}
                                        @elseif ($det->bukti_dokumen ?? '')
                                            <td></td>
                                        @endif

                                    </tr>
    
                                    @if($det->verifikasi->status === 'Belum Verified' ?? '')
                                        {{-- <tr>
                                            <td>Verifikator</td>{{  }}
                                            <td class="px-1">:</td>
                                            <td></td>
                                        </tr> --}}
    
                                    @elseif($det->verifikasi->status === 'Koreksi' ?? '')
                                        <tr>
                                            <td>Verifikasi</td>
                                            <td class="px-1">:</td>
                                            <td>{{ $det->pegVerifikator->pegawai->nama_pegawai }} </td>
                                        </tr>
                                        <tr class="tx-bold">
                                            <td>Ket. Koreksi</td>
                                            <td>:</td>
                                            <td>{{ $det->ket_koreksi }}</td>
                                        </tr>
                                    @elseif($det->verifikasi->status === 'Verified' ?? '')
                                        <tr>
                                            <td>Verifikasi</td>
                                            <td class="px-1">:</td>
                                            <td>{{ $det->pegVerifikator->pegawai->nama_pegawai }} </td>
                                        </tr>
                                    @endif
                                </table>
                            </p>
    
                            <!-- ICON AKSI VERIFIKATOR STATUS = BELUM -->
                            @if($det->verifikasi->status === 'Belum Verified' ?? '')
                                <div class="col-md-3 d-flex p-0">
    
                                    <!--verified-->
                                    <a href="#verifikasi_laporan{{ $det->id }}" class="px-2 m-0 text-success" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Verifikasi Laporan">
                                        <i data-feather="check-circle" ></i>
                                    </a>
                                    
                                    <!--tolak-->
                                    <a href="#tolak_laporan{{ $det->id }}" class="px-2 m-0 text-danger" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Tolak Laporan">
                                        <i data-feather="x-circle" ></i>
                                    </a>
                                    
                                    <!--koreksi-->
                                    <a href="#koreksi_laporan{{ $det->id }}" class="px-2 m-0 text-warning" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Koreksi Laporan">
                                        <i data-feather="alert-circle" ></i>
                                    </a>
    
                                </div>
                            
                            <!-- ICON AKSI VERIFIKATOR STATUS = KOREKSI -->
                            @elseif($det->verifikasi->status === 'Koreksi' ?? '')
                                <div class="col-md-2 d-flex p-0">
                                    <!--verified-->
                                    <a href="#verifikasi_laporan{{ $det->id }}" class="px-2 m-0 text-success" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Verifikasi Laporan">
                                        <i data-feather="check-circle" ></i>
                                    </a>
                                    <!--tolak-->
                                    <a href="#tolak_laporan{{ $det->id }}" class="px-2 m-0 text-danger" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Tolak Laporan">
                                        <i data-feather="x-circle" ></i>
                                    </a>
                                </div>
                            @endif
    
                        </div>
                        <div class="col-lg-3" >
                            @if($det->bukti_foto == null)
                                <p>Tidak ada foto</p>
                                    {{-- <img src="{{ url('') }}/assets/img/photos.png" width="100%" alt=""
                                    data-bs-toggle="tooltip" data-placement="top" title="Tidak ada foto"> --}}
                                
                            @elseif($det->bukti_foto )
                                {{-- @foreach ($det->bukti_foto as $item)
                                <a href="{{asset('bukti/images/' . $item)}}" target="_blank" rel="noopener noreferrer">Lihat Foto</a><br> --}}
                                {{-- <p>
                                    <img src="{{asset('bukti/images/' . $item)}}" width="100%" alt="Foto-foto aktifitas" 
                                    data-bs-toggle="tooltip" data-placement="top" title="{{ $det->detReport->ket_foto ?? '' }}">
                                </p> --}}
                                {{-- @endforeach --}}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- az-accordion -->
        @else
            <h6 class="mt-3 text-secondary">Tidak ada laporan yang harus diverifikasi.</h6>
        @endif

        <!-- pagination -->
        {!! $kinerja->withQueryString()->links('pagination::bootstrap-5') !!}

    </div><!-- container -->

    <!-- Aksi Verifikator -->
    @foreach ($kinerja as $det)
        <!--modal koreksi laporan-->
        <div class="modal fade" id="koreksi_laporan{{ $det->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"> Koreksi Laporan Aktifitas</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('verifikator.verifikasi-laporan.update', $det->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="d-block">Koreksi</label>
                                <textarea class="form-control" name="ket_koreksi" rows="2" placeholder="Masukkan Koreksi" required></textarea>
                                <input type="number" name="verifikasi_id" value="1" hidden>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" autofocus class="btn btn-primary tx-13"> Simpan</button>
                                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        
        <!--modal verifikasi laporan-->
        <div class="modal fade" id="verifikasi_laporan{{ $det->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"> Verifikasi Laporan Aktifitas</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('verifikator.verifikasi-laporan.update', $det->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="d-block">Apakah anda yakin untuk verifikasi laporan?</label>
                                {{-- <textarea class="form-control" name="ket_koreksi" rows="2" placeholder="Masukkan Koreksi" required></textarea> --}}
                                <input type="number" name="verifikasi_id" value="2" hidden>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" autofocus class="btn btn-primary tx-13"> Ya</button>
                                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>

        <!--modal tolak laporan-->
        <div class="modal fade" id="tolak_laporan{{ $det->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"> Tolak Laporan Aktifitas</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('verifikator.verifikasi-laporan.update', $det->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="d-block">Apakah anda yakin untuk menolak laporan ini?</label>
                                {{-- <textarea class="form-control" name="ket_koreksi" rows="2" placeholder="Masukkan Koreksi" required></textarea> --}}
                                <input type="number" name="verifikasi_id" value="4" hidden>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" autofocus class="btn btn-primary tx-13"> Tolak</button>
                                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection