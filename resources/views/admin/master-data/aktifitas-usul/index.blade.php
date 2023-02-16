@extends('layouts.main')

@section('title', 'Aktifitas Usul')

@section('content')

<div class="container p-0 m-0 pd-x-0 pd-lg-x-10 pd-xl-x-0" style="width: 100%">
    
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

    <div class="row">
        <div class="col-sm mb-2">
            <a href="#tambah" data-toggle="modal" class="btn btn-primary mb-3"><i data-feather="plus"></i> Tambah Data</a>
            <a href="" class="btn btn-success mb-3"><i data-feather="file-plus"></i> Export</a>
        </div>
    </div>

    <table id="example1" class="table" width="100%">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th width="10%">Aspek</th>
                <th width="20%">Aktifitas Group</th>
                <th width="30%">Aktifitas Usulan</th>
                <th width="5%">Menit</th>
                <th width="10%">Waktu Pengisian</th>
                <th width="10%">Output</th>
                <th width="5%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usulan as $no => $usul)
                <tr>
                    {{-- <td>{{ $no+1 }}</td> --}}
                    <td>{{ $usul->aspek->aspek }}</td>
                    <td>{{ $usul->group->group_aktifitas }}</td>
                    <td>{{ $usul->aktifitas_usulan }}</td>
                    <td>{{ $usul->menit }}</td>
                    <td>{{ $usul->waktu_pengisian }}</td>
                    <td>{{ $usul->output }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#ubah{{ $usul->id }}" data-toggle="modal"><i class="far fa-edit fa-sm text-primary pr-1"></i> Ubah</a>
                                <a class="dropdown-item" href="#hapus{{ $usul->id }}" data-toggle="modal"><i class="far fa-trash-alt fa-sm text-danger pr-2"></i> Delete</a>
                            </div>
                        </div> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- modal tambah data -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Tambah Aktifitas Usulan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-row">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Aktifitas Usulan</label>
                                <input type="text" name="aktifitasUsulan" class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="formGroupExampleInput" class="d-block">Menit</label>
                                <select  class="custom-select" required name="menit" id="">
                                    <option value="">Pilih</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                    <option value="90">90</option>
                                    <option value="120">120</option>
                                    <option value="135">135</option>
                                    <option value="150">150</option>
                                    <option value="180">180</option>
                                    <option value="300">300</option>
                                    <option value="450">450</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="formGroupExampleInput" class="d-block">Waktu Pengisian</label>
                                <select class="custom-select " required name="waktuPengisian" id="">
                                    <option value="">Pilih</option>
                                    <option value="Mingguan">Mingguan</option>
                                    <option value="Bulanan">Bulanan</option>
                                    <option value="Semester">Semester</option>
                                    <option value="Tahunan">Tahunan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Output</label>
                                <select class="custom-select 1" required name="output" id="">
                                    <option value="">Pilih</option>
                                    <option value="JTM">JTM</option>
                                    <option value="Foto Kegiatan">Foto Kegiatan</option>
                                    <option value="Dokumen">Dokumen</option>
                                    <option value="Hasil Tulisan">Hasil Tulisan</option>
                                    <option value="Paparan">Paparan</option>
                                    <option value="Sertifikat">Sertifikat</option>
                                    <option value="Kegiatan">Kegiatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Kembali</button>
                            <button type="button" class="btn btn-primary tx-13">Simpan</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <!-- modal ubah data -->
    <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Ubah Aktifitas Usulan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-row">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Aktifitas Usulan</label>
                                <input type="text" name="aktifitasUsulan" class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="formGroupExampleInput" class="d-block">Menit</label>
                                <select  class="custom-select" required name="menit" id="">
                                    <option value="">Pilih</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                    <option value="90">90</option>
                                    <option value="120">120</option>
                                    <option value="135">135</option>
                                    <option value="150">150</option>
                                    <option value="180">180</option>
                                    <option value="300">300</option>
                                    <option value="450">450</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="formGroupExampleInput" class="d-block">Waktu Pengisian</label>
                                <select class="custom-select " required name="waktuPengisian" id="">
                                    <option value="">Pilih</option>
                                    <option value="">Mingguan</option>
                                    <option value="">Bulanan</option>
                                    <option value="">Semester</option>
                                    <option value="">Tahunan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="formGroupExampleInput" class="d-block">Output</label>
                                <select class="custom-select 1" required name="output" id="">
                                    <option value="">Pilih</option>
                                    <option value="">JTM</option>
                                    <option value="">Foto Kegiatan</option>
                                    <option value="">Dokumen</option>
                                    <option value="">Hasil Tulisan</option>
                                    <option value="">Paparan</option>
                                    <option value="">Sertifikat</option>
                                    <option value="">Kegiatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Kembali</button>
                            <button type="button" class="btn btn-primary tx-13">Ubah</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}


    @foreach ($usulan as $no => $usul)
    <!--modal hapus data-->
    {{-- Modal Hapus Data Usul --}}
    <div class="modal fade" id="hapus{{$usul->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-14">
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <h6 class="p-3">Apakah anda yakin? Data akan dihapus permanen.</h6>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tx-13"> Hapus</button>
                            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal"> Kembali</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div><!-- container -->

@endsection