@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Konseling</h1>
    <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
    <p>Pilih paket konseling sesuai kebutuhan Anda.</p>
    </div>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">Paket Konseling</h2>
          <p>Rumi Foundation Training menyediakan tiga paket konseling yang dapat Anda pilih sesuai kebutuhan.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="00">
          <div class="pricing">
            <!-- <div class="pricing-img mb-4"><img src="images/1x/asset-1.png" alt="Image" class="img-fluid"></div> -->
            <div class="pricing-body">

              <h3 class="pricing-plan-title">Konseling online via DM Instagram</h3>
              <div class="price"><span class="fig">Rp200.000</span><span>/3bulan</span></div>
              <p class="mb-4">Dilaksanakan di hari aktif (Senin - Jum'at) pukul 20.00 - 22.00 WIB. Dilaksanakan selama 3 bulan</p>
              
              <p><a href="/notedm" class="btn btn-outline-primary">Learn More</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="pricing">
            <!-- <div class="pricing-img mb-4"><img src="images/1x/asset-2.png" alt="Image" class="img-fluid"></div> -->
            <div class="pricing-body">

              <h3 class="pricing-plan-title">Konseling Online Via Videocall WhatsApp</h3>
              <div class="price"><span class="fig">Rp200.000</span><span>/2jam</span></div>
              <p class="mb-4">Dilaksanakan di hari aktif (Senin-Jumat), untuk weekend dikenakan biaya tambahan Rp 50.000.</p>
              
              <p><a href="/nodevc" class="btn btn-primary">Learn More</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="pricing">
            <!-- <div class="pricing-img mb-4"><img src="images/1x/asset-3.png" alt="Image" class="img-fluid"></div> -->
            <div class="pricing-body">

              <h3 class="pricing-plan-title">Konseling Offline (Tatap Muka)</h3>
              <div class="price"><span class="fig">Rp300.000</span><span>/2jam</span></div>
              <p class="mb-4">Dilaksanakan di hari aktif (Senin-Jumat), untuk weekend dikenakan biaya tambahan Rp 50.000.</p>
              
              <p><a href="/notetm" class="btn btn-outline-primary">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- /.untree_co-section -->
@endsection