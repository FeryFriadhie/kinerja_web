@extends('layouts.main')

@section('title', 'Edit Data Pegawai')

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

    @foreach($pegawai as $peg)
    <form action="{{route('admin.master-data.data-pegawai.update', $peg->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama_pegawai">
        </div>
        <div class="form-group col-md-4">
            <label for="">NIK</label>
            <input type="number" class="form-control"  id="inputBlocks" name="nik">
        </div>
        <div class="form-group col-md-3">
            <label for="">Akses</label>
            <select class="custom-select" name="verifikator_id" id="">
                <option value="" selected>Pilih Satu</option>
                <option value="1">Member</option>
                <option value="2">Verifikator</option>
                <option value="2">Validator</option>
                <option value="3">Admin</option>
            </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/admin/data-pegawai" type="button" class="btn btn-warning">Kembali</a>
    </form>
    @endforeach

</div><!-- container -->

{{-- <script>
  $('.select2').select2({
  ajax: {
    url: 'https://api.github.com/search/repositories', //ambil data dari db
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});
</script> --}}

@endsection