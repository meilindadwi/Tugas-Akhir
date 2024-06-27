@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Konselor</h1>
@endsection

@section('content')
<div class="untree_co-section bg-light">
    <div class="container">
        <div class="row">
            @foreach($konselors as $konselor)
                <div class="col-12 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="staff text-center">
                        <div class="mb-4">
                            <img src="{{ asset('fotokonselor/' . $konselor->foto) }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="staff-body">
                            <h3 class="staff-name">{{ $konselor->nama }}</h3>
                            <p class="mb-2">{{ $konselor->pengalaman }}</p>
                            <p class="mb-4">{{ $konselor->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> <!-- /.untree_co-section -->
@endsection