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

    <div class="row mb-3">
        <div class="col-lg-3 mb-2">
          <input type="text" id="dateFrom" class="form-control" placeholder="Dari tanggal">
        </div><!-- col -->
        <div class="col-lg-3 mb-2">
          <input type="text" id="dateTo" class="form-control" placeholder="Sampai tanggal">
        </div><!-- col -->
        <div class="col-lg-3">
            <button class="btn btn-primary mb-2" type="submit"><i data-feather="filter"></i> Filter</button>
            <button class="btn btn-primary mb-2" type="submit"><i data-feather="printer"></i> Cetak</button>
        </div>
    </div><!-- row -->

    <table id="example1" class="table">
        <thead>
          <tr>
            <th class="wd-20p">Name</th>
            <th class="wd-25p">Position</th>
            <th class="wd-20p">Office</th>
            <th class="wd-15p">Age</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
            </tr>
        </tbody>
    </table>

</div><!-- container -->


@endsection