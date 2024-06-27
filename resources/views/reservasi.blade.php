@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Reservasi Konseling</h1>
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
                        <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="consultation_method" class="col-sm-4 col-form-label">Metode Konseling</label>
                                <div class="col-sm-8">
                                    <select name="consultation_method" class="form-control" id="consultation_method" required>
                                        <option value="" disabled selected>Pilih metode</option>
                                        <option value="dm instagram">DM Instagram</option>
                                        <option value="video call">Video Call</option>
                                        <option value="offline">Offline</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="date" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="time" class="col-sm-4 col-form-label">Waktu</label>
                                <div class="col-sm-8">
                                    <input type="time" name="time" class="form-control" id="time" value="{{ old('time') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="notes" class="col-sm-4 col-form-label">Catatan</label>
                                <div class="col-sm-8">
                                    <textarea name="notes" class="form-control" id="notes">{{ old('notes') }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="pembayaran" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
                                <div class="col-sm-8">
                                    <input type="file" name="pembayaran" class="form-control" id="pembayaran" required>
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
