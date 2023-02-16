@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<div class="content content-fixed content-auth-alt">
    <div class="content content-fixed content-auth">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="media-body align-items-center d-none d-lg-flex">
                    <div class="mx-wd-500 mg-lg-l-50">
                        <img src="{{ url('') }}/assets/img/login.png" class="img-fluid" alt="" />
                    </div>
                </div>
                <!-- media-body --> 
                <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                    <div class="wd-100p"> 
                        <h3 class="tx-color-01 mg-b-5">Login</h3>
                        <p class="tx-color-03 tx-16 mg-b-40">Selamat datang kembali! Silahkan Login untuk melanjutkan.</p>
                        
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Username or Email</label>
                                {{-- <input type="text" class="form-control" id="" name="email"   autocomplete="" placeholder="Username or email" /> --}}
                                {{-- <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukan NIK" /> --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                            </div> 
                            
                            
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Enter your password" />
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection