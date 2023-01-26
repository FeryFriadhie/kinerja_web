@extends('layouts.guest')

@section('title', 'Login')
    
@section('content')
<div class="content content-fixed content-auth" style="margin-top: 5.5rem; margin-bottom: 4rem">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
            <div class="media-body align-items-center d-none d-lg-flex">
                <div class="mx-wd-550 mg-lg-l-50">
                    <img src="../../assets/img/login.png" class="img-fluid" alt="" />
                </div>
            </div>
            <!-- media-body -->
            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p">
                    <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                    <p class="tx-color-03 tx-16 mg-b-40">Selamat datang kembali! Silahkan signin untuk melanjutkan.</p>

                    <form action="{{ route('login') }}" method="post">
                    
                        @csrf
                        
                        <div class="form-group">
                            <label>Alamat Email</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="yourname@yourmail.com" />
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Kata Sandi</label>
                                {{-- <a href="" class="tx-13">Lupa Kata Sandi?</a> --}}
                            </div>

                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection