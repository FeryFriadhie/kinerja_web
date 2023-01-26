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
        <div class="col-lg-8 col-xl-7 mg-t-10">
          <div class="card">
            <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
              <h6 class="mg-b-0">Recurring Revenue Growth</h6>
              <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                <li class="list-inline-item d-flex align-items-center">
                  <span class="d-block wd-10 ht-10 bg-df-1 rounded mg-r-5"></span>
                  <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Growth Actual</span>
                </li>
                <li class="list-inline-item d-flex align-items-center mg-l-5">
                  <span class="d-block wd-10 ht-10 bg-df-2 rounded mg-r-5"></span>
                  <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Actual</span>
                </li>
                <li class="list-inline-item d-flex align-items-center mg-l-5">
                  <span class="d-block wd-10 ht-10 bg-df-3 rounded mg-r-5"></span>
                  <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Plan</span>
                </li>
              </ul>
            </div><!-- card-header -->
            <div class="card-body pos-relative pd-0">
              <div class="pos-absolute t-20 l-20 wd-xl-100p z-index-10">
                <div class="row">
                  <div class="col-sm-5">
                    <h3 class="tx-normal tx-rubik tx-spacing--2 mg-b-5">$620,076</h3>
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">MRR Growth</h6>
                    <p class="mg-b-0 tx-12 tx-color-03">Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="">Learn More</a></p>
                  </div><!-- col -->
                  <div class="col-sm-5 mg-t-20 mg-sm-t-0">
                    <h3 class="tx-normal tx-rubik tx-spacing--2 mg-b-5">$1,200</h3>
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">Avg. MRR/Customer</h6>
                    <p class="mg-b-0 tx-12 tx-color-03">The revenue generated per account on a monthly or yearly basis. <a href="">Learn More</a></p>
                  </div><!-- col -->
                </div><!-- row -->
              </div>

              <div class="chart-one">
                <div id="flotChart" class="flot-chart"></div>
              </div><!-- chart-one -->
            </div><!-- card-body -->
          </div><!-- card -->
        </div>
        <div class="col-lg-4 col-xl-5 mg-t-10">
          <div class="card">
            <div class="card-header pd-t-20 pd-b-0 bd-b-0">
              <h6 class="mg-b-5">Account Retention</h6>
              <p class="tx-12 tx-color-03 mg-b-0">Number of customers who have active subscription with you.</p>
            </div><!-- card-header -->
            <div class="card-body pd-20">
              <div class="chart-two mg-b-20">
                <div id="flotChart2" class="flot-chart"></div>
              </div><!-- chart-two -->
              <div class="row">
                <div class="col-sm">
                  <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">$1,680<small>.50</small></h4>
                  <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-primary">Expansions</p>
                  <div class="tx-12 tx-color-03">Customers who have upgraded the level of your products.</div>
                </div><!-- col -->
                <div class="col-sm mg-t-20 mg-sm-t-0">
                  <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">$1,520<small>.00</small></h4>
                  <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-pink">Cancellations</p>
                  <div class="tx-12 tx-color-03">Customers who have ended their subscription.</div>
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- card-body -->
          </div><!-- card -->
        </div>
      </div><!-- row -->

  
    </div><!-- container -->

@endsection