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
                <p>Rumi Foundation Training menyediakan paket konseling yang dapat Anda pilih sesuai kebutuhan.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($konseling as $item)
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing">
                        <div class="pricing-body">
                            <h3 class="pricing-plan-title">{{ $item->judul }}</h3>
                            <div class="price"><span class="fig">Rp{{ number_format($item->harga, 0, ',', '.') }}</span></div>
                            <p class="mb-4">{{ $item->deskripsi }}</p>
                            <p><a href="{{ $item->url }}" class="btn btn-outline-primary">Booking Sesi</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection