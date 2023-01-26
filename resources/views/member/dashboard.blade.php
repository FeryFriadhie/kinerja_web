@extends('layouts.main-member')

@section('title', 'Dashboard')

@section('content')
    
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-sm-6 col-lg-3">
          <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Conversion Rate</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0.81%</h3>
              <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-up"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart3" class="flot-chart ht-30"></div>
              </div><!-- chart-three -->
          </div>
        </div><!-- col -->
        <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
          <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Unique Purchases</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3,137</h3>
              <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.7% <i class="icon ion-md-arrow-down"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart4" class="flot-chart ht-30"></div>
              </div><!-- chart-three -->
          </div>
        </div><!-- col -->
        <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
          <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Avg. Order Value</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">$306.20</h3>
              <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.3% <i class="icon ion-md-arrow-down"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart5" class="flot-chart ht-30"></div>
              </div><!-- chart-three -->
          </div>
        </div><!-- col -->
        <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
          <div class="card card-body">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Order Quantity</h6>
            <div class="d-flex d-lg-block d-xl-flex align-items-end">
              <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1,650</h3>
              <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">2.1% <i class="icon ion-md-arrow-up"></i></span></p>
            </div>
            <div class="chart-three">
                <div id="flotChart6" class="flot-chart ht-30"></div>
              </div><!-- chart-three -->
          </div>
        </div><!-- col -->
      </div><!-- row -->
      
    </div><!-- container -->

@endsection