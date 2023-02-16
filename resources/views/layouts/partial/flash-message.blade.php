@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>{{ $message }}</strong>

  {{-- <span class="btn btn-close"></span> --}}

  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" data-feather=""></button> --}}

</div>

@endif 

    

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">

  <strong>{{ $message }}</strong>

</div>

@endif

     

@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">

  <strong>{{ $message }}</strong>

  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}

</div>

@endif

     

@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show" role="alert">

  <strong>{{ $message }}</strong>

  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}

</div>

@endif

    

@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">

  <strong>Cek kembali error</strong>

  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}

</div>

@endif