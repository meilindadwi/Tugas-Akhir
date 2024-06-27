@extends('layouts.main')

@section('container')
<h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Webinar Tematik</h1>
    <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
    <p>Webinar bulanan Rumi Foundation Training yang mengangkat tema-tema tertentu terkait kesehatan mental.</p>
    </div>
@endsection

@section('content')
<div class="untree_co-section bg-light">
    <div class="container"> 
        <div class="row">
            @forelse($materis as $materi)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="custom-media">
                        <a href="#"><img src="{{ asset('storage/' . $materi->foto) }}" alt="Image" class="img-fluid"></a>
                        <div class="custom-media-body">
                            <div class="d-flex justify-content-between pb-3">
                                <div class="text-primary">
                                    <span class="icon-calendar mr-2"></span> 
                                    <span>{{ \Carbon\Carbon::parse($materi->tanggal)->format('d M, Y') }}</span>
                                </div>
                                <div class="review">
                                    <span class="icon-clock-o"></span> 
                                    <span>{{ $materi->waktu }}</span>
                                </div>
                            </div>
                            <div class="text-primary mb-3"> <!-- Margin bawah ditambahkan untuk memberikan jarak -->
                                <span class="icon-person mr-2"></span>
                                <span class="pembicara">{{ $materi->pembicara }}</span>
                            </div>

                            <h3 class="mb-3">{{ $materi->judul }}</h3> <!-- Margin bawah untuk memberikan jarak antara pembicara dan judul -->
                            <p class="mb-4">{{ $materi->deskripsi_materi }}</p>
                            <div class="border-top d-flex justify-content-between pt-3 mt-3 align-items-center">
                                <div><a href="/payment">Daftar Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No webinars found</p>
            @endforelse
        </div>
    </div>
</div>
@endsection