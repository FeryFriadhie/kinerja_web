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
        </div>

        @include('layouts.partial.flash-message')

         <!-- search + add button -->
         <form action="/validator/validasi-laporan" method="GET">
            @csrf
            <div class="row row-xs mb-3">
                <div class="col-lg-4 mb-2">
                    <select class="form-select custom-select" id="cari-verifikator" name="verifikator" data-bs-toggle="tooltip" data-placement="top" title="Cari Verifikator">
                        <option value="" selected>Pilih Verifikator</option>
                        @foreach ($pegVerifikator as $verifikator)
                        <option value="{{ $verifikator->pegawai_id ?? ''}}">{{ $verifikator->pegawai->nama_pegawai ?? ''}}</option> 
                        @endforeach 
                    </select>   
                </div>
                <div class="col-lg-4 mb-2">
                    <select class="custom-select form-control" id="cari-guru" name="guru" data-bs-toggle="tooltip" data-placement="top" title="Cari Guru">
                    </select>   
                </div>
                <div class="mb-2 d-block">
                    <button class="btn btn-sm pd-x-15 p-2 btn-success btn-uppercase" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Filter Laporan Aktifitas"><i data-feather="filter" class="mr-1"></i> Filter</button>
                </div>
                <div class="d-none d-md-block">
                    <a href="#validasi_semua" type="button" class="px-2 m-0 btn btn-primary btn-uppercase" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Validasi semua laporan">
                        <i data-feather="check-circle" class="mr-1"></i> Validasi Semua 
                    </a>
                </div>
                <div class="mb-2">
                    <a href="/validator/validasi-laporan" class="btn btn-sm pd-x-15 p-2 btn-light btn-uppercase" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Refresh Halaman"><i data-feather="refresh-cw" class=""></i></a>
                </div>
            </div>
        </form>
        
        <!-- list laporan -->
        @if (!$data->isEmpty())
            @foreach($data as $det)
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
                                        <td>{{ $det->group->group_aktifitas ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td> Usulan</td>
                                        <td class="px-2">:</td>
                                        <td>{{ $det->usulan->aktifitas_usulan ?? ''}}</td>
                                    </tr>
                                </table>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <p class="tx-gray-500 m-0 ">{{ $det->tanggal ?? ''}}</p>
                            <p data-bs-toggle="tooltip" data-placement="top" title="">
                                <i class="fas fa-user fa-sm pr-2 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Guru"></i> {{$det->pegawai->nama_pegawai ?? ''}} <br>
                                <i class="fas fa-user-check fa-sm pr-2 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Verifikator"></i> {{$det->pegVerifikator->pegawai->nama_pegawai ?? ''}}
                            </p>
                        </div>
                        <div class="col-lg-2">

                            @if($det->verifikasi->status === 'Verified' ?? '')
                                <!-- Aksi Validasi -->
                                <a href="#validasi_laporan{{ $det->id }}" id="validasi" class="px-2 m-0 text-secondary validasi" data-toggle="modal"  data-bs-toggle="tooltip" data-placement="top" title="Validasi Laporan">
                                    <i data-feather="check-circle" ></i>
                                </a>
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
        @else
            <h6 class="mt-3 text-secondary">Tidak ada laporan yang harus diverifikasi.</h6>
        @endif

        <!-- pagination -->
        {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}

    </div><!-- container -->

    @foreach ($data as $det)
        <!-- Validasi semua laporan -->
        <div class="modal fade" id="validasi_semua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"> Validasi Semua Laporan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('validator.validasi-laporan.updateall')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="d-block tx-14">Apakah anda yakin? Semua laporan akan divalidasi.</label>
                                <input type="number" name="verifikasi_id" value="5" hidden>
                            </div>
                            <div class="float-right">
                                <button type="submit" autofocus class="btn btn-primary tx-13"> Ya</button>
                                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        <!-- validasi laporan -->
        <div class="modal fade" id="validasi_laporan{{ $det->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"> Verifikasi Laporan Aktifitas</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('validator.validasi-laporan.update', $det->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="formGroupExampleInput" class="d-block">Apakah anda yakin untuk memvalidasi laporan?</label>
                                <input type="number" name="verifikasi_id" value="5" hidden>
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
    @endforeach

    <style>
        #validasi i:hover{
            color: blue
        }
    </style>

@endsection

@push('script')
<script>
    $(document).ready(function () {
      $('#cari-verifikator').on('change', function () {
          var idGuru = this.value;
        //   console.log(idGuru);

          $("#cari-guru").html('');
          $.ajax({
              url: "{{url('get-guru')}}",
              type: "POST",
              data: {
                  id_pegawai : idGuru,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                // console.log(res);
                  $('#cari-guru').html('<option value="">Pilih Guru</option>');
                  $.each(res, function (key, value) {
                      $("#cari-guru").append('<option value="' + value
                          .id_pegawai + '">' + value.nama_pegawai + '</option>');
                      console.log(value);
                  });
              }
          });
      });
  });
</script>

@endpush