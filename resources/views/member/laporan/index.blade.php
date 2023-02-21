@extends('layouts.main')

@section('title', 'Laporan')
    
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

    <form action="/member/laporan" method="get" autocomplete="off">
        <div class="row row-xs mb-3 hiden">
            <div class="col-sm-3 mb-3">
                <input type="text" id="dateFrom" name="dari_tanggal" class="form-control hiden" placeholder="Dari tanggal" required data-bs-toggle="tooltip" data-placement="top" title="Dari Tanggal">
            </div>
            <div class="col-sm-3 mb-3">
                <input type="text" id="dateTo" name="sampai_tanggal" class="form-control hiden" placeholder="Sampai tanggal" required data-bs-toggle="tooltip" data-placement="top" title="Sampai Tanggal">
            </div>
            <div class="col-sm mb-2">
                <button id="btn_filter" class="btn btn-primary mb-2 hiden" type="submit"><i data-feather="filter" data-bs-toggle="tooltip" data-placement="top" title="Filter Laporan"></i> Filter</button>

                <button class="btn btn-success mb-2 hiden" id="btPrint" onclick="createPDF()" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Cetak Laporan Aktifitas"><i data-feather="printer"></i> Cetak</button> 

                <a href="/member/laporan" id="btn_filter" class="btn btn-light mb-2 hiden" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Refresh Halaman"><i data-feather="refresh-cw"></i> </a>
            </div>
        </div>
    </form>
        
    <div id="box">
        <table id="lap_kinerja" class="table datatable">
            <thead>
            <tr>
                <th width="5">No</th>
                <th width="8">Hari</th>
                <th width="15">Tanggal</th>
                <th width="8">Jumlah Menit</th>
                <th width="25">Uraian Pekerjaan</th>
                <th width="2">Paraf</th>
            </tr>
            </thead>
            {{-- @if (!$laporan->isEmpty()) --}}
            <tbody>
                @foreach($laporan as $no => $item)  
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{ $item->hari}}</td>
                    <td>{{ $item->tanggal}}</td>
                    <td>{{ $item->jumlah}}</td>
                    <td class="uraian">{{ $item->aspek->aspek}},
                        {{ $item->group->group_aktifitas}}, 
                        {{ $item->usulan->aktifitas_usulan}}
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            {{-- @else
                <h6 class="mt-3 text-secondary">Tidak ada laporan.</h6>
            @endif --}}
        </table>
    </div>

</div><!-- container -->

@include('member.laporan.export')

@endsection

@push('js')
<script>
    let lap_kinerja_table = $('#lap_kinerja').dataTable();

$('#btn_filter').click(function(){
    var dari_tanggal = $('#dateFrom').val();
    var sampai_tanggal = $('#dateTo').val();

    $.ajax({
        url: "{{ route('laporan.kinerja.ajax') }}",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            "dateFrom": dari_tanggal,
            "dateTo": sampai_tanggal
        },
        success: function(response){
            lap_kinerja_table.fnClearTable()
            lap_kinerja_table.fnAddData(response.data)
        }
    });
});
</script>
@endpush