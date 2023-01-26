@extends('layouts.main')

@section('title', 'Pengguna Sistem')

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



    </div><!-- container -->

@endsection