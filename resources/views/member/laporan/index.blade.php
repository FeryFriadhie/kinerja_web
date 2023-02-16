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


    <div class="row mb-3 hiden">
        <div class="col-sm-3 mb-3">
            <input type="text" id="dateFrom" class="form-control hiden" placeholder="Dari tanggal">
        </div>
        <div class="col-sm-3 mb-3">
            <input type="text" id="dateTo" class="form-control hiden" placeholder="Sampai tanggal">
        </div>
        <div class="col-sm mb-2">
            <button class="btn btn-primary mb-2 hiden" type="submit"><i data-feather="filter"></i> Filter</button>
            <button class="btn btn-success mb-2 hiden" id="btPrint" onclick="createPDF()" type="submit"><i data-feather="printer"></i> Cetak</button> 
        </div>
    </div>
        
    <div id="box">
        <table id="example1" class="table">
            <thead>
            <tr>
                <th width="">No</th>
                <th width="">Hari</th>
                <th width="">Tanggal</th>
                <th width="">Jumlah Menit</th>
                <th width="">Uraian Pekerjaan</th>
                <th width="">Foto</th>
                <th width="">Paraf</th>
            </tr>
            </thead>
            <tbody>
                @foreach($laporan as $no => $item)  
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$item->hari}}</td>
                    <td>{{$item->tanggal}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td class="uraian">{{$item->aspek->aspek}}, 
                        {{$item->group->group_aktifitas}}, 
                        {{$item->usulan->aktifitas_usulan}}
                    </td>
                    <td class="d-flex">
                        @if($item->bukti_foto == null)
                            <img src="{{ url('') }}/assets/img/photos.png" width="50%" alt=""></p> 
                        @elseif($item->bukti_foto)
                            @foreach ($item->bukti_foto as $show)
                                <img src="{{asset('bukti/images/' . $show)}}" width="50%" alt=""></p>
                            @endforeach
                        @endif
                    </td>
                    <td>-</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div><!-- container -->

@include('member.laporan.export')

@endsection

{{-- @push('script')
<script>
    function createPDF() {
        var sTable = document.getElementById('box').innerHTML;

        var style = "<style>";
        style = style + "* {font-size: 12px; font-family: sans-serif}";
        style = style + "table {width: 100%; margin-bottom: 3em; margin-top: 2em; font-size: 12px}";
        style = style + "th {font-size: 12px}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse; border-color: black;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + ".dt-button {display: none}";
        style = style + ".dataTables_length {display: none}";
        style = style + ".dataTables_info {display: none}";
        style = style + ".dataTables_paginate {display: none}";
        style = style + "#tbl_filter {display: none}";
        style = style + ".title {text-align: center; margin: 1em}";
        style = style + ".ttd {display: flex; justify-content: space-around;}";
        style = style + ".box-ttd {text-align: center; margin-right: 2em;}";
        style = style + ".nama {margin-top: 5em; text-decoration: underline; font-weight: bold;}";
        style = style + "p {margin: 0;}";
        style = style + ".hiden {display: none;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Laporan PEKKA <?= date('F Y') ?></title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<h5 class="title">LAPORAN PERKEMBANGAN KELOMPOK PEKKA KABUPATEN CIAMIS</h5>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('<div class="container"><div class="row ttd"><div class="col-md-4 box-ttd"><p>Mengetahui:</p><p>Kasi Pemberdayaan Perempuan</p><p class="nama">Dra.Hj. ERNI MULYANINGSIH, S.Pd</p><p>NIP. 19670224 199303 2 005 -IV/a</p></div><div class="col-md-4 box-ttd"><p>Ciamis, <?= date('j F Y') ?></p><p>Pendamping PEKKA</p><p class="nama">RATNA KOMALASARI</p></div></div></div>');
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
@endpush --}}