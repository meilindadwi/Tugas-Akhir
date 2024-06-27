@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">New Islamic Healing</h1>
    <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
    <p>Kelas online berbasis web tentang Islamic Healing untuk muslimah yang ingin menjadi sebaik-baiknya hamba meskipun dalam kondisi psikologis tidak baik dan untuk muslimah yang ingin berbagi dan belajar tentang Islamic Healing.</p>
    <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="/payment" class="btn btn-secondary">Beli Sekarang</a></p>
    </div>
@endsection

@section('content')
<div class="untree_co-section bg-light">
    <div class="container"> 
        <div class="row">
            @forelse($materis as $materi)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="custom-media">
                    @if ($materi->video_materi)
                    <div>
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/' . $materi->video_materi) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @else
                    <a href="#"><img src="images/default-image.jpg" alt="Image" class="img-fluid"></a>
                    @endif
                    <div class="custom-media-body">
                        <h3>{{ $materi->judul }}</h3>
                        <p class="mb-4">{{ $materi->deskripsi_materi }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    Tidak ada materi yang tersedia saat ini.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

<style>
    .custom-media {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .custom-media video {
        width: 100%;
        height: auto;
        display: block;
    }
</style>