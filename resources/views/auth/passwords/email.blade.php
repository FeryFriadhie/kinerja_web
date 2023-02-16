@extends('layouts.guest')

@section('content')

<div class="content content-fixed content-auth-alt">
    <div class="container d-flex justify-content-center ht-100p">
        <div class="mx-wd-300 wd-sm-450 ht-100p d-flex flex-column align-items-center justify-content-center">
            <div class="wd-80p wd-sm-300 mg-b-15"><img src="../../assets/img/forgot-pw.png" class="img-fluid" alt="" /></div>
            <h4 class="tx-20 tx-sm-24">Atur ulang kata sandi Anda</h4>
            <p class="tx-color-03 mg-b-30 tx-center">Masukkan alamat Email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.</p>
            <div class="wd-100p d-flex flex-column flex-sm-row mg-b-40">
                <input type="text" class="form-control wd-sm-250 flex-fill" placeholder="Masukan Email" />
                <button class="btn btn-brand-02 mg-sm-l-10 mg-t-10 mg-sm-t-0">Atur Ulang Kata Sandi</button>
            </div>
            <!-- <span class="tx-12 tx-color-03">Key business concept vector is created by <a href="https://www.freepik.com/free-photos-vectors/business">freepik (freepik.com)</a></span> -->
        </div>
    </div>
    <!-- container -->
</div>
<!-- content -->
</div>

@endsection
