@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Kelas Online</h1>
    <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
    <p>Pilih paket kelas online sesuai kebutuhan Anda.</p>
    </div>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">Paket Kelas Online</h2>
          <p>Rumi Foundation Training menyediakan tiga paket kelas online yang dapat Anda pilih sesuai kebutuhan.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="00">
          <div class="pricing">
            <!-- <div class="pricing-img mb-4"><img src="images/1x/asset-1.png" alt="Image" class="img-fluid"></div> -->
            <div class="pricing-body">

              <h3 class="pricing-plan-title">New Islamic Healing</h3>
              <div class="price"><span class="fig">Rp200.000</span><span>/batch</span></div>
              <p class="mb-4">Berisi fasilitas video materi yang dapat diakses selamanya dan forum online untuk berdiskusi dengan konselor</p>
              
              <p><a href="/payment" class="btn btn-outline-primary">Get Started</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="pricing">
            <!-- <div class="pricing-img mb-4"><img src="images/1x/asset-2.png" alt="Image" class="img-fluid"></div> -->
            <div class="pricing-body">

              <h3 class="pricing-plan-title">Pre Marriage Healing</h3>
              <div class="price"><span class="fig">Rp150.000</span><span>/batch</span></div>
              <p class="mb-4">Berisi fasilitas video materi yang dapat diakses selamanya dan forum online untuk berdiskusi dengan konselor</p>
              
              <p><a href="/payment" class="btn btn-primary">Get Started</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="pricing">
            <!-- <div class="pricing-img mb-4"><img src="images/1x/asset-3.png" alt="Image" class="img-fluid"></div> -->
            <div class="pricing-body">

              <h3 class="pricing-plan-title">Webinar Tematik</h3>
              <div class="price"><span class="fig">Infak terbaik</span><span>/sesi</span></div>
              <p class="mb-4">Rekaman webinar dapat diakses selamanya melalui youtube RFT</p>
              
              <p><a href="/payment" class="btn btn-outline-primary">Get Started</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- /.untree_co-section -->
@endsection