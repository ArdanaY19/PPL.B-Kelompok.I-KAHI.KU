@extends('customer.layouts.master')

@section('content')
<div class="col-md-12 mt-3">
      <div class="card">
      <h2 class="text-center text-success font-weight-bold">KAHIKU</h2>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <img src="{{ url('images/kc2.jpg') }}" class="rounded mx-auto d-block" width="100%" height="300" alt="">
            </div>
            <div class="col-md-4">
              <img src="{{ url('images/kc1.jpeg') }}" class="rounded mx-auto d-block" width="100%" height="300" alt="">
            </div>
            <div class="col-md-4">
              <img src="{{ url('images/kc3.jpg') }}" class="rounded mx-auto d-block" width="100%" height="300" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    
<section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6 text-success" data-aos="fade-right" data-aos-delay="25">
            <h2>Kahiku</h2>
            <h3>MARI LESTARIKAN DAN BUDAYAKAN MENGKONSUMSI KACANG HIJAU UNTUK KEBUTUHAN GIZI ANDA</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 text-justify" data-aos="fade-left" data-aos-delay="50">
            <p>
            Kahiku merupakan marketpace yang menyediakan berbagai jenis kacang hijau yang dipanen serta dirawat oleh petani-petani Demak jawa tengah Indonesia dengan kualitas nomor 1.
            </p>
            <!-- <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
            </ul> -->
            <p class="font-italic text-justify">
            Disini anda bisa membeli kacang hijau yang anda inginkan tanpa harus keluar rumah dan praktis diantar ke rumah anda serta kami menyediakan fitur artikel untuk memperluas wawasan customer maupun petani terhadap hasil olahan dan informasi mengenai kacang hijau.
            </p>
          </div>
        </div>

      </div>
    </section>

@endsection