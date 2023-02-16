@extends('layouts.guest')

@section('title', 'e-Kinerja | SMKN 1 Ciamis')

@section('content')

<!-- caraousel -->
  @include('layouts.partial.caraousel')
<!-- end carousel -->

  <!-- content -->
  {{-- Prakata --}}
  <div class="content container">
    <div class="border-0 card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h4 class="py-2" id="beranda">PRAKATA KEPALA SEKOLAH</h4>
            <p>Assalamualaikum Warahmatullahi Wabarakatuh.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero officiis architecto perspiciatis earum ipsam quaerat. Ipsa aliquid quaerat eligendi aperiam ullam quae, nam dolorem eum minima. Unde eaque porro maxime.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque dolor architecto pariatur voluptatem vel, optio iure, cum dolore consequuntur magnam quis voluptas! Praesentium error nostrum in distinctio, similique et consequatur?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa quos amet, nemo minima incidunt quam ipsam eos et ut officia consectetur explicabo aliquid error repudiandae itaque blanditiis asperiores, placeat dolore!</p>
            <p>Wassalamualaikum Warahmatullahi Wabarakatuh.</p>
          </div>
          <div class="col-12 col-sm-6 my-auto embed-responsive-16by9">
            <iframe width="100%" height="330px" class="embed-responsive-item" loading="lazy" src="https://www.youtube.com/embed/Av7U1LsO10o" title="PROFIL SMKN 1 CIAMIS 2021/2022" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" frameborder="0" allowfullscreen="">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Faq --}}
  <div class="content container">
    <div class="border-0 card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <h4 class="py-2" id="tentang">FAQ e-Kinerja SMKN 1 Ciamis</h4>
            <div class="mt-4">
              <div id="accordion1" class="accordion">
                <h6 class="accordion-title">Apa itu e-Kinerja</h6>
                <div class="accordion-body">e-Kinerja adalah</div>
                <h6 class="accordion-title">Bagaimana Cara menggunakan aplikasi e-kinerja</h6>
                <div class="accordion-body">Caranya adalah</div>
                <h6 class="accordion-title">Siapa saja pengguna aplikasi e-kinerja</h6>
                <div class="accordion-body">Pengguna terdiri dari</div>
              </div><!-- az-accordion -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Maps --}}
  <div class="content container">
    <div class=" border-0 card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <h4 class="py-2" id="kontak">Lokasi SMKN 1 Ciamis</h4>
            <div class="mt-4">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.755416734222!2d107.59062291615483!3d-6.919816055979029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e619b542ce69%3A0xfbb0b345299c8fa3!2sSmkn%201%20Ciamis!5e0!3m2!1sid!2sid!4v1674630908979!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end content -->
@endsection