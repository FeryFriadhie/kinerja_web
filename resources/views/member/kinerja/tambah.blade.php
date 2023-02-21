@extends('layouts.main')

@section('title', 'Form Laporan Kinerja')

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
            <h4 class="mg-b-0 tx-spacing--1">Form Laporan</h4>
        </div>
    </div>

    @include('layouts.partial.flash-message')

    <form action="{{ route('member.kinerja.store')}} " method="POST" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>
      @csrf
      <div class="form-row">
        <div class="form-group col-lg-6">
          <label for="">Stakeholder <span class="text-danger">*</span></label>
            <select class="custom-select form-control select2-input" name="stakeholder_id" required>
              <option value="" selected>Pilih Satu</option>
              @foreach ($stakeholder as $item)
              <option value="{{ $item->id }}">{{ $item->stakeholder }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group col-lg-6">
          <label for="">Aspek <span class="text-danger">*</span></label>
          <select class="custom-select form-control select2-input" name="aspek_id" onchange="getGroup()" id="aspek-dd" required>
            <option value="0" selected>Pilih Satu</option>
            
            @foreach($aspek as $id => $aspek)
              <option data-id="{{$aspek->id}}" value="{{$aspek->id}}"> {{$aspek->aspek}} </option>
            @endforeach

          </select>
        </div>
        <div class="form-group col-lg-6">
          <label for="">Aktifitas Group <span class="text-danger">*</span></label>
          <select class=" form-control select2-input" name="group_id" id="group-dd" required>
          </select>
        </div>
        <div class="form-group col-lg-6">
          <label>Aktifitas Usulan <span class="text-danger">*</span></label>
            <select class=" form-control select2-input" name="usul_id" id="usul-dd" required>
            </select>
        </div>
        
        <div class="form-group col-lg-4">
          <label for="jumlah_jam">Jumlah <span class="text-danger">*</span></label>
          <input type="number" placeholder="JTM yang dilaksanakan" class="form-control" name="jumlah" id="jumlah" required>
        </div>
        <div class="form-group col-lg-4">
          <label for="">Bukti foto <span class="text-danger">*</span></label>
          {{-- <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="bukti_foto[]" multiple required>
            <label class="custom-file-label" for="customFile">Pilih Foto</label>
          </div> --}}
          <input type="file" class="form-control" name="bukti_foto[]" id="inputFile" multiple required>
        </div>
        <div class="form-group col-lg-4 ">
          <label for="">Bukti Dokumen <span class="text-danger">*</span></label>
          {{-- <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="bukti_dokumen[]" multiple required>
            <label class="custom-file-label" for="">Pilih Dokumen</label>
          </div> --}}
            <input type="file" class="form-control" name="bukti_dokumen[]" id="inputFile" multiple required>
        </div>
        <div class="form-group col-lg-4">
          <label for="ket_foto">Ket. Foto <span class="text-danger">*</span></label>
          <textarea class="form-control" id="ket_foto" name="ket_foto" rows="3" placeholder="Keterangan" required></textarea>
        </div>
        <div class="form-group col-lg-4 ">
          <label for="ket_dokumen">Ket. Dokumen <span class="text-danger">*</span></label>
          <textarea class="form-control" id="ket_dokumen" name="ket_dokumen" rows="3" placeholder="Keterangan" required></textarea>
        </div>
        <div class="form-group col-lg-4 ">
          <label for="ket_aktifitas">Ket. Aktifitas <span class="text-danger">*</span></label>
          <textarea class="form-control" id="ket_aktifitas" name="ket_aktifitas" rows="3" placeholder="Keterangan" required></textarea>
        </div>
      </div>
      <button type="submit" id="alertBtn" class="btn btn-primary">Simpan</button>
      <a href="/member/kinerja" class="btn btn-secondary">Kembali</a>
    </form>

</div>

@endsection

@push('script')
<script>
    $(document).ready(function () {
      $('#aspek-dd').on('change', function () {
          var idGroup = this.value;

          $("#group-dd").html('');
          $.ajax({
              url: "{{url('get-group')}}",
              type: "POST",
              data: {
                  group_id : idGroup,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                // console.log(res);
                  $('#group-dd').html('<option value="">Pilih Aktifitas Group</option>');
                  $.each(res, function (key, value) {
                      $("#group-dd").append('<option value="' + value
                          .id + '">' + value.group_aktifitas + '</option>');
                      // console.log(value);
                  });
              }
          });
      });

      $('#group-dd').on('change', function () {
          var idUsul = this.value;
          // console.log('tes');
          $("#usul-dd").html('');
          $.ajax({
              url: "{{url('get-usul')}}",
              type: "POST",
              data: {
                  usul_id : idUsul,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                // console.log(res);
                  $('#usul-dd').html('<option value="">Pilih Aktifitas Usulan</option>');
                  $.each(res, function (key, value) {
                      $("#usul-dd").append('<option value="' + value
                          .id + '">' + value.aktifitas_usulan + '</option>');
                      // console.log(value);
                  });
              }
          });
      });
  });
</script>

@endpush