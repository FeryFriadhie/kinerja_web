@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

</div>

@endif 

    

@if ($message = Session::get('danger'))

<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

</div>

@endif

     

@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

</div>

@endif

     

@if ($message = Session::get('info'))

<div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">

  <strong>{{ $message }}</strong>

</div>

@endif

    

@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">

  <strong>Periksa kembali setiap inputan yang dimasukkan</strong>

</div> 

@endif


<!-- set timer alert -->
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>