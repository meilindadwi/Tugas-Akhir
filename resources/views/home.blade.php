@extends('layouts.main')

@section('container')
  <a href="#" href="https://vimeo.com/342333493" data-fancybox data-aos="fade-up" data-aos-delay="0" class="caption mb-4 d-inline-block">Buka Diri untuk Pemulihan</a>
  <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Membantu Anda Memulai Proses Pemulihan</h1>
@endsection

@section('content')
    <!-- About Us Section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 mb-5">
                    <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">About Us</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Rumi Foundation Training adalah salah satu divisi kegiatan Yayasan RUMI yang berfokus pada kesehatan mental dan pengembangan diri muslimah melalui kegiatan training dan konseling Islamic Healing.</p>
                    <ul class="list-unstyled ul-check mb-5 primary" data-aos="fade-up" data-aos-delay="200">
                        <li>Pemahaman yang mendalam</li>
                        <li>Kenyamanan konseling online</li>
                        <li>Ketersediaan yang fleksibel</li>
                        <li>Komunitas dukungan</li>
                        <li>Keamanan dan kerahasiaan</li>
                        <li>Mendukung pertumbuhan pribadi</li>
                    </ul>
                    <p data-aos="fade-up" data-aos-delay="200">
                        <a href="/about" class="btn btn-outline-primary">Learn More</a>
                    </p>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-1"></div>
                    <a href="images/img-school-1-min.jpg" class="item-wrap fancybox mb-4" data-fancybox="gal" data-aos="fade-up" data-aos-delay="0">
                        <img class="img-fluid" src="images/img-school-5-min.jpg">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Konselors Section -->
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
                            <p class="mb-4">{{ $konselor->pengalaman }}</p>
                            <p class="mb-4">{{ $konselor->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="untree_co-section bg-light">
        <div class="container">
            <div class="row">
                <!-- Hasil Testimoni -->
                <div class="col-lg-7 text-center">
                    <h3 class="line-bottom mb-4">Testimonials</h3>
                    <div class="owl-carousel wide-slider-testimonial">
                        @foreach($testimonis as $testimoni)
                        <div class="item">
                            <blockquote class="block-testimonial">
                                <p>{{ $testimoni->testimoni }}</p>
                                <div class="author">
                                    <img src="images/person_1.jpg" alt="Avatar">
                                    <h3>{{ $testimoni->nama }}</h3>
                                </div>
                            </blockquote>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Form Testimoni -->
                <div class="col-lg-5 text-center">
                    <h3 class="line-bottom mb-4">Masukkan Testimonial Anda</h3>
                    <form action="{{ route('testimoni.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="testimoni" rows="3" placeholder="Masukkan testimoni Anda" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mr-auto mb-5 mb-lg-0"  data-aos="fade-up" data-aos-delay="0">
                    <img src="images/img-school-5-min.jpg" alt="image" class="img-fluid">
                </div>
                <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="line-bottom mb-4">Frequently Asked Questions</h3>

                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Jika saya tidak melakukan konseling selama periode aktif, apakah uang saya kembali?</button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    <div class="d-flex">
                                        <div>
                                            <p>Setiap layanan konseling di Rumi Foundation Training memiliki masa rentang periode aktif masing-masing. Ketika klien tidak mendapatkan sama sekali penawaran "Pindah Layanan" dari admin dan klien belum pernah sama sekali menggunakan layanan konseling selama masa periode aktif, maka klien berhak mengajukan refund 50% dari biaya komitmen konseling</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Apa saja layanan konseling Rumi Foundation Training?</button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    <div class="d-flex">
                                        <div>
                                            <p>Saat ini kami melayani konseling online via DM instagram, Konseling online via Videocall Whatsapp, Konseling Offline bersama 1 konselor dan Konseling Offline bersama 2 konselor (untuk permasalahan pasutri dan parenting)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Berapa biaya konseling di RFT?</button>
                            </h2>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    <div class="d-flex">
                                        <div>
                                            <p>Konseling di Rumi Foundation Training memiliki biaya komitmen konseling berkisar antara Rp 200.000 - Rp 1.000.000, sesuai dengan kasus dan jenis konseling yang diambil</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection