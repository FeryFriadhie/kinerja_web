@extends('layouts.main')

@section('title', 'Kinerja')
    
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

        <!-- alert -->
        @include('layouts.partial.flash-message')

        <!-- search + add button -->
        <form action="/member/kinerja" method="get">
            <div class="row row-xs mb-3">
                <div class="col-lg-4 mb-2">
                    <select class="custom-select form-control select2-statuses" id="cari-statuses" name="status" data-bs-toggle="tooltip" data-placement="top" title="Pilih Status">
                        <option value="" selected>Pilih Status</option>
                        @foreach ($verifikasi as $item)
                            <option value="{{ $item->id }}">{{ $item->status }}</option>
                        @endforeach
                    </select>   
                </div>
                <div class="mb-2 block">
                    <button type="submit" class="btn btn-sm pd-x-15 p-2 btn-success btn-uppercase" data-bs-toggle="tooltip" data-placement="top" title="Filter Laporan"><i data-feather="filter" class="mr-1"></i> Filter</button>
                </div>
                <div class="mb-2 block">
                    <a href="{{ route('member.kinerja.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-placement="top" title="Tambah Laporan Aktifitas"><i data-feather="plus"></i> Tambah Data</a>
                </div>
                <div class="mb-2 block">
                    <a href="/member/kinerja" class="btn btn-sm pd-x-15 p-2 btn-light btn-uppercase" data-bs-toggle="tooltip" data-placement="top" title="Refresh Halaman"><i data-feather="refresh-cw" class=""></i> </a>
                </div>
            </div>
        </form>

        <!-- list laporan -->
        @if (!$kinerja->isEmpty())
        <div id="accordion1" class="accordion mb-1">
            @foreach($kinerja as $det)
                <h6 class="accordion-title">
                    <div class="row">
                        <div class="col-lg-7">
                            <h6 class=" p-0 m-0 pt-1 mb-1">Laporan Aktifitas</h6>
                        </div>
                        <div class="col-lg-3">
                            <p class="p-0 m-0 p-1 mb-1 text-secondary">{{$det->tanggal ?? ''}}</p>
                        </div>
                        <div class="col-lg-2 d-flex">

                            <!-- ikon jika ada koreksian, bisa diedit -->
                            @if ($det->verifikasi->status === 'Koreksi' ?? null) 
                            <p class="p-0 m-0 text-warning" data-bs-toggle="tooltip" data-placement="top" title="Laporan perlu dikoreksi">
                                <i data-feather="alert-circle" ></i>
                            </p>
                            <a href="#edit_laporan{{$det->id}}" data-toggle="modal" class="p-0 pl-3 m-0 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Edit Laporan">
                                <i data-feather="edit"></i>
                            </a>

                            <!-- ikon status jika sudah valid -->
                            @elseif ($det->verifikasi->status === 'Valid' ?? '')
                            <p class="p-0 m-0 text-primary tx-bold" data-bs-toggle="tooltip" data-placement="top" title="Sudah diverifikasi dan divalidasi">
                                <i data-feather="check-circle" ></i>
                            </p>
                                
                            <!-- icon status jika verified -->
                            @elseif ($det->verifikasi->status === 'Verified' ?? '')
                            <p class="p-0 pt-1 m-0 text-success" data-bs-toggle="tooltip" data-placement="top" title="Sudah diverifikasi">
                                <i data-feather="check-circle" ></i>
                            </p>

                            <!-- icon status jika belum verified, bisa dihapus, bisa diedit? -->
                            @elseif ($det->verifikasi->status === 'Belum Verified' ?? '')
                            <p class="p-0 m-0 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Belum diverifikasi">
                                <i data-feather="minus-circle" ></i>
                            </p>
                            <a href="#edit_laporan{{$det->id}}" data-toggle="modal" class="p-0 pl-3 m-0 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Edit Laporan">
                                <i data-feather="edit"></i>
                            </a>
                            <a href="#hapus_laporan{{$det->id}}" data-toggle="modal" class="p-0 m-0 pl-3 text-secondary" data-bs-toggle="tooltip" data-placement="top" title="Hapus Laporan">
                                <i data-feather="trash-2"></i>
                            </a>

                            <!-- icon status jika ditolak -->
                            @elseif ($det->verifikasi->status === 'Ditolak' ?? '')
                            <p class="p-0 m-0 text-danger" data-bs-toggle="tooltip" data-placement="top" title="Ditolak">
                                <i data-feather="x-circle" ></i>
                            </p>

                            @endif
                        </div>
                    </div>
                </h6>
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-9">
                            <p class="m-0 p-0">
                                <table>
                                    <tr>
                                        <td>Stakeholder</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->stakeholder->stakeholder ?? null}}</td>
                                    </tr>
                                    <tr>
                                        <td>Aspek</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->aspek->aspek ?? null}}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Aktifitas Group</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->group->group_aktifitas ?? null}}</td>
                                    </tr>
                                    <tr>
                                        <td>Aktifitas Usulan</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->usulan->aktifitas_usulan ?? null}}</td>
                                    </tr>
                                    <tr>
                                        <td>Output dan Menit</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->usulan->output ?? null}} ({{$det->jumlah ?? null}} Menit)</td>
                                    </tr>

                                    <tr>
                                        <td>Bukti Dokumen</td>
                                        <td class="px-1">:</td>
                                        {{-- @if($det->bukti_dokumen != false) --}}
                                        @if(isset($det->bukti_dokumen))
                                            @foreach (explode (',', $det->bukti_dokumen) as $doc) 
                                            {{-- {{$doc}} --}}
                                            @php
                                                $temp = str_replace("[\"", '', $doc);
                                                $doc = str_replace("\"]", '', $temp);
                                            @endphp
                                            <td>
                                                <a href="{{route('view.doc', str_replace('.','&',$doc))}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a>
                                            </td>
                                            @endforeach
                                        @elseif ($det->bukti_dokumen ?? '')
                                            <td></td>
                                        @endif
                                    </tr>

                                    <!--Jika status belum verified-->
                                    @if($det->verifikasi->status === 'Belum Verified' ?? '')

                                    <!-- jika status koreksi ada ket koreksi -->
                                    @elseif($det->verifikasi->status === 'Koreksi' ?? '')
                                    <tr>
                                        <td>Verifikator</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->pegVerifikator->pegawai->nama_pegawai }} </td>
                                    </tr>
                                    <tr class="tx-bold">
                                        <td>Ket. Koreksi</td>
                                        <td>:</td>
                                        <td>{{ $det->ket_koreksi ?? null}}</td>
                                    </tr>

                                    <!-- jika verified ada nama verified -->
                                    @elseif($det->verifikasi->status === 'Verified' ?? '')
                                    <tr>
                                        <td>Verifikator</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->pegVerifikator->pegawai->nama_pegawai }} </td>
                                    </tr>
                                    
                                    <!-- jika sudah valid ada nama verifikator dan validator  -->
                                    @elseif($det->verifikasi->status === 'Valid' ?? '')
                                    <tr>
                                        <td>Verifikator</td>
                                        <td class="px-1">:</td>
                                        <td>{{ $det->pegVerifikator->pegawai->nama_pegawai }} </td>
                                    </tr>
                                    <tr>
                                        <td>Validator</td>
                                        <td class="px-1">:</td>
                                        <td>{{$det->verifikator->nama_pegawai}} </td>
                                    </tr>

                                    @endif
                                </table>
                            </p>
                        </div>
                        <div class="col-lg-3">
                            @if($det->bukti_foto == '')
                                <p>
                                    Tidak ada foto
                                    {{-- <img src="{{ url('') }}/assets/img/photos.png" width="100%" alt="" 
                                    data-bs-toggle="tooltip" data-placement="top" title="Tidak ada foto"> --}}
                                </p> 
                            @elseif(isset($det->bukti_foto))
                                @foreach (explode (',',$det->bukti_foto) as $foto => $item)
                                @php
                                        $temp = str_replace("[\"", '', $item);
                                        $temp = str_replace("\"", '', $temp);
                                        $item = str_replace("]", '', $temp);
                                @endphp
                                {{-- @foreach (json_decode($det->bukti_foto) as $item) --}}
                                    {{-- <td>
                                        <a href="{{route('view.foto', str_replace('.','&',$foto))}}" target="_blank" rel="noopener noreferrer">Lihat Foto</a>
                                    </td> --}}
                                    <a href="{{asset('bukti/images/' . str_replace('"[/"', '', $item))}}" target="_blank" rel="noreferrer">Lihat Foto</a><br>
                                    {{-- <p>
                                        <img src="{{asset('bukti/images/' . $item)}}" width="100%" alt="Foto-foto aktifitas" 
                                        data-bs-toggle="tooltip" data-placement="top" title="{{ $det->ket_foto ?? '' }}">
                                    </p> --}}
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- az-accordion -->
        @else
            <h6 class="mt-3 text-secondary">Tidak ada laporan.</h6>
        @endif

        <!-- pagination -->
        {!! $kinerja->withQueryString()->links('pagination::bootstrap-5') !!}
    
    </div><!-- container -->


    <!-- modal edit laporan aktifitas -->
    @foreach($kinerja as $det)
    <div class="modal fade" id="edit_laporan{{$det->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"> Edit Laporan Aktifitas</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('member.kinerja.update', $det->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Stakeholder</label>
                                <select name="stakeholder_id" class="form-control custom-select" >
                                    <option value="{{ $det->stakeholder_id }}"> {{ $det->stakeholder->stakeholder ?? ''}} </option>
                                    {{-- <option value="" selected>Pilih Satu</option> --}}
                                    {{-- @foreach ($stakeholder as $item)
                                    <option value="{{ $item->id }}">{{ $item->stakeholder }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Aspek</label>
                                <select name="aspek_id" class="form-control custom-select " >
                                    <option value="{{ $det->aspek_id }}"> {{ $det->aspek->aspek ?? ''}} </option>
                                    {{-- <option value="" selected>Pilih Satu</option>
                                    @foreach($aspek as $item)
                                    <option value="{{$item->id}}"> {{$item->aspek}} </option>
                                    @endforeach --}}
                                </select>
                            </div>
                                
                            <div class="form-group col-md-6">
                                <label for="">Aktifitas Group</label>
                                <select class=" form-control custom-select " name="group_id" id="group-dd" >
                                    <option value="{{ $det->group_id }}"> {{ $det->group->group_aktifitas ?? ''}} </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Aktifitas Usulan</label>
                                <select class=" form-control custom-select" name="usul_id" id="usul-dd" >
                                    <option value="{{ $det->usul_id }}"> {{ $det->usulan->aktifitas_usulan ?? ''}} </option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label>Jumlah</label>
                                <input name="jumlah" type="number" value="{{$det->jumlah / 45}}" placeholder=" JTM yang dilaksanakan" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Bukti foto</label>
                                <input type="file" class="form-control" name="foto[]" id="inputFile" multiple >
                            </div>
                            <div class="form-group col-md-4 ">
                                <label for="">Bukti Dokumen</label>
                                <input name="bukti_dokumen[]"  type="file" class="form-control" id="inputGroupFile01" multiple>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Ket. Foto</label>
                                <textarea name="ket_foto" class="form-control" rows="3" placeholder="Keterangan">{{$det->ket_foto}}</textarea>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label for="">Ket. Dokumen</label>
                                <textarea name="ket_dokumen" class="form-control" rows="3" placeholder="Keterangan">{{$det->ket_dokumen}}</textarea>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label for="">Ket. Aktifitas</label>
                                <textarea name="ket_aktifitas" class="form-control" rows="3" placeholder="Keterangan">{{$det->ket_aktifitas}}</textarea>
                            </div>
                        </div>
                        <button type="submit" autofocus class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>

    <!-- Modal hapus Data Laporan -->
    <div class="modal fade" id="hapus_laporan{{$det->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <form action="{{ route('member.kinerja.destroy', $det->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah anda yakin? Laporan akan <span class="text-danger">dihapus permanen.</span></p>
                        <div class="modal-footer">
                            <button type="submit" autofocus class="btn btn-primary tx-13"> Hapus</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    @endforeach
    

@endsection

@push('script')
<script>
    $(document).ready(function () {
      $('#aspek-dd').on('change', function () {
          var idGroup = this.value;

          $("#group-dd").html('');
          $.ajax({
              url: "{{url('get-group')}}",
              type: "POST",
              data: {
                  group_id : idGroup,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                // console.log(res);

                  $('#group-dd').html(
                    '<option value="">Pilih Aktifitas Group</option>'
                    );
                  $.each(res, function (key, value) {
                      $("#group-dd").append('<option value="' + value
                          .id + '">' + value.group_aktifitas + '</option>');
                      // console.log(value);
                  });
              }
          });
      });

      $('#group-dd').on('change', function () {
          var idUsul = this.value;
          // console.log('tes');
          $("#usul-dd").html('');
          $.ajax({
              url: "{{url('get-usul')}}",
              type: "POST",
              data: {
                  usul_id : idUsul,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                // console.log(res);
                  $('#usul-dd').html('<option value="">Pilih Aktifitas Usulan</option>');
                  $.each(res, function (key, value) {
                      $("#usul-dd").append('<option value="' + value
                          .id + '">' + value.aktifitas_usulan + '</option>');
                      // console.log(value);
                  });
              }
          });
      });
  });
</script>
@endpush

