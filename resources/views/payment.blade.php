@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Bukti Pembayaran</h1>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="0">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="class" class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8">
                                    <select name="class" class="form-control" id="class" required>
                                        <option value="" disabled selected>Pilih kelas</option>
                                        <option value="nih">New Islamic Healing</option>
                                        <option value="pmh">Pre Marriage Healing</option>
                                        <option value="webinar">Webinar Tematik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="payment_proof" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
                                <div class="col-sm-8">
                                    <input type="file" name="payment_proof" class="form-control" id="payment_proof" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card mt-4 mt-lg-0">
                    <div class="card-body">
                        <h4 class="mb-2">Metode Pembayaran</h4>
                        <p>
                            Bank Transfer<br>
                            BSI : 7243624597 a.n. Amalia Roza Brillianty
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection