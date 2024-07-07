@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Reservasi Konseling</h1>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="0">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-2">Informasi rekening tujuan</h4>
                        <p>
                            Bank tujuan : BSI<br>
                            No rekening : 7243624597 a.n. Amalia Roza Brillianty
                        </p>
                    </div>
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
                                    <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" required readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" required readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="consultation_method" class="col-sm-4 col-form-label">Metode Konseling</label>
                                <div class="col-sm-8">
                                    <select name="consultation_method" class="form-control" id="consultation_method" required>
                                        <option value="" disabled selected>Pilih metode</option>
                                        <option value="dm instagram" data-price="200000">DM Instagram</option>
                                        <option value="video call" data-price="200000">Video Call</option>
                                        <option value="offline" data-price="300000">Offline</option>
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
                                <label for="price" class="col-sm-4 col-form-label">Jumlah yang dibayarkan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}" readonly>
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
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const consultationMethodSelect = document.getElementById('consultation_method');
        const priceInput = document.getElementById('price');

        consultationMethodSelect.addEventListener('change', function () {
            const selectedOption = consultationMethodSelect.options[consultationMethodSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price;
        });
    });
</script>
@endsection