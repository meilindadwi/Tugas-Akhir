@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Tentang kami</h1>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
        <div class="row">
            @foreach ($abouts as $about)
            @if ($about->judul === 'Sejarah RFT')
            <div class="col-lg-6 mb-5"> <!-- Kolom untuk teks -->
                <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">{{ $about->judul }}</h2>
                <p data-aos="fade-up" data-aos-delay="100">{{ $about->deskripsi }}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-1"></div>
                <a href="{{ Storage::url($about->foto) }}" class="item-wrap fancybox mb-4" data-fancybox="gal" data-aos="fade-up" data-aos-delay="0">
                    <img class="img-fluid" src="{{ Storage::url($about->foto) }}">
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div> <!-- /.untree_co-section -->

<div class="untree_co-section">
    <div class="container">
        <div class="row">
            @foreach ($abouts as $about)
            @if ($about->judul === 'Islamic Healing')
            <div class="col-lg-6 mb-5"> <!-- Kolom untuk teks -->
                <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">{{ $about->judul }}</h2>
                <p data-aos="fade-up" data-aos-delay="100">{{ $about->deskripsi }}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-1"></div>
                <a href="{{ Storage::url($about->foto) }}" class="item-wrap fancybox mb-4" data-fancybox="gal" data-aos="fade-up" data-aos-delay="0">
                    <img class="img-fluid" src="{{ Storage::url($about->foto) }}">
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div> <!-- /.untree_co-section -->

<div class="services-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="line-bottom mb-4">Visi RFT</h2>
                </div>
                <p data-aos="fade-up" data-aos-delay="100">Menjadi salah satu lembaga konseling dan training berbasis Islam terdepan dan amanah, serta memberikan layanan konseling dan training kesehatan mental dalam rangka membangun peradaban Islam yang gemilang</p>
                <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="line-bottom mb-4">Misi RFT</h2>
                </div>
                <ul class="ul-check list-unstyled mb-5 primary" data-aos="fade-up" data-aos-delay="200">
                    <li>Mengembangkan teknik Konseling dan Training Islamic Healing yang sesuai dengan kepribadian dan kehidupan seorang muslim.</li>
                    <li>Memberikan layanan jasa Konseling dan Training Islamic Healing yang sesuai dengan kebutuhan klien untuk membantu klien menemukan insight pesan cinta dari Allah ta'ala dalam problematika kehidupannya.</li>
                    <li>Melakukan TOT untuk mencetak para konselor yang memahami prinsip-prinsip Islamic Healing sehingga akan memperluas jangkauan Islamic Healing dalam kehidupan kaum muslimin ditengah gempuran kehidupan yang rusak akibat diterapkannya sekulerisme, liberalisme dan kapitalisme.</li>
                </ul>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
                <figure class="img-wrap-2">
                    <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                    <div class="dotted"></div>
                </figure>
            </div>
        </div>
    </div>
</div>
@endsection