@extends('layouts.main')

@section('title', 'Dashboard')

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

      <div class="row row-xs">
            <!-- Bagian card -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
              <div class="card card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <h4 class="tx-uppercase tx-14 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Belum Validasi </h4>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                      <h4 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3</h4>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i data-feather="users" class="tx-info" width="35" height="35"></i>
                  </div>
                </div>
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
              <div class="card card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <h4 class="tx-uppercase tx-14 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Sudah Validasi</h4>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                      <h4 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">10</h4>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i data-feather="users" class="tx-info" width="35" height="35"></i>
                  </div>
                </div>
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <h4 class="tx-uppercase tx-14 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Menunggu Validasi</h4>
                    <div class="d-flex d-lg-block d-xl-flex align-items-end">
                      <h4 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1</h4>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i data-feather="user" class="tx-info" width="35" height="35"></i>
                  </div>
                </div>
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <h4 class="tx-uppercase tx-14 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Validasi</h4>
                  <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h4 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">90</h4>
                  </div>
                  </div>
                  <div class="col-auto">
                    <i data-feather="users" class="tx-info" width="35" height="35"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Akhir card -->
            <!-- Bagian bar chart -->
            <div class="col-lg-12 col-xl-12 mg-t-10">
              <div class="card">
                <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                  <h6 class="mg-b-5">Chart Laporan Kinerja</h6>
                  <!-- <p class="tx-12 tx-color-03 mg-b-0">Number of customers who have active subscription with you.</p> -->
                </div><!-- card-header -->
                <div class="card-body pd-20">
                  <div class="chart-two mg-b-20">
                    <div id="flotChart2" class="flot-chart"></div>
                  </div><!-- chart-two -->
                  <div class="row">
                    <!-- <div class="col-sm">
                      <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">$1,680<small>.50</small></h4>
                      <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-primary">Expansions</p>
                      <div class="tx-12 tx-color-03">Customers who have upgraded the level of your products.</div>
                    </div>col -->
                    <!-- <div class="col-sm mg-t-20 mg-sm-t-0">
                      <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">$1,520<small>.00</small></h4>
                      <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-pink">Cancellations</p>
                      <div class="tx-12 tx-color-03">Customers who have ended their subscription.</div>
                    </div>col -->
                  </div><!-- row -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div>
            <!-- Akhir bar chart -->
          </div><!-- row -->
    </div><!-- container -->

@endsection