@extends('layouts.guest')

@section('title', 'e-Kinerja | SMKN 1 Ciamis')
    

@section('content')
    

  <!-- caraousel -->
    @include('layouts.partial.caraousel')
  <!-- end carousel -->

  <!-- content -->
  <div class="container">

    <div class="home mx-2 my-5" >
      <h4 class="py-2" id="beranda">This.</h4>
      <div class="row">
        <div class="col-lg-6 p-3">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam vero aspernatur adipisci ducimus odit fugiat, consequuntur molestiae. Sapiente eum in amet accusamus incidunt aperiam, numquam natus odio, quo, unde voluptatem?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quibusdam non reprehenderit. Rerum iste, voluptates illo accusamus ducimus sit nobis id aspernatur consequuntur quo, facere dolor officiis in consequatur optio!
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui beatae exercitationem, explicabo consequatur inventore ipsa maiores placeat expedita nemo doloribus, obcaecati animi quibusdam at facilis libero maxime quisquam eveniet rem?
        </div>
        <div class="col-lg-6">
          <img src="assets/img/photos.png" class="img-fluid" width="300" alt="">
        </div>
      </div>
    </div>

    <div class="home mx-2 my-5" >
      <h4 class="py-2" id="tentang">FAQ.</h4>
      <div id="accordion1" class="accordion">
        <h6 class="accordion-title">What does royalty free mean?</h6>
        <div class="accordion-body">Royalty free means you just need to pay for rights to use the item once per end product. You don't need to pay additional or ongoing fees for each person who sees or uses it.</div>
        <h6 class="accordion-title">What do you mean by item and end product?</h6>
        <div class="accordion-body">The item is what you purchase from Envato Market. The end product is what you build with that item. For example, the item is a business card template; the end product is the finalized business card. The item is a button graphic; the end product is an app using the button graphic in the app's interface. </div>
        <h6 class="accordion-title">What are some examples of permitted end products?</h6>
        <div class="accordion-body">You can buy a web template, add your text and images, and use it as your website. You can buy an HTML site template, convert it to WordPress, and use it as your website (but not as a stock template for sale. You can buy a flyer template, modify the text, print a flyer, and hand it out. You can buy a game starter kit, compile it, and put the game on an app store. You can buy a music track and use it in your radio or TV ad.</div>
      </div><!-- az-accordion -->
    </div>
    
    <div class="home mx-2 my-5" >
      <h4 class="py-2" id="kontak">Maps.</h4>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.755416734222!2d107.59062291615483!3d-6.919816055979029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e619b542ce69%3A0xfbb0b345299c8fa3!2sSmkn%201%20Ciamis!5e0!3m2!1sid!2sid!4v1674630908979!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

  </div>
  <!-- end content -->

@endsection

  