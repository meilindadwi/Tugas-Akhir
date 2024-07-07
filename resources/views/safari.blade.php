@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Safari Healing</h1>
    <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
    <p>Safari Healing bertujuan untuk mengenalkan Rumi Foundation Training dengan mengadakan kajian yang berkaitan tentang kesehatan mental. Kami membuka peluang untuk mengadakan kolaborasi bersama komunitas lain.</p>
    <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="https://wa.me/6285712017990" class="btn btn-secondary">Hubungi admin</a></p>
    </div>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
        <div class="row">
            @foreach ($safaris as $safari)
                <div class="col-md-6 col-lg-4 item">
                    <a href="{{ Storage::url($safari->foto) }}" class="item-wrap fancybox mb-4" data-fancybox="gal" data-aos="fade-up" data-aos-delay="0">
                        <span class="icon-search2"></span>
                        <img class="img-fluid" src="{{ Storage::url($safari->foto) }}" alt="Foto Safari">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div> <!-- /.untree_co-section -->
@endsection