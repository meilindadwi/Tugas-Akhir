@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Konfirmasi Pembayaran</h1>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center">
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="date" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control" id="date" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="class" class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8">
                                    <select name="class" class="form-control" id="class" required>
                                        <option value="" disabled selected>Pilih kelas</option>
                                        <option value="nih" data-price="200000">New Islamic Healing</option>
                                        <option value="pmh" data-price="150000">Pre Marriage Healing</option>
                                        <option value="webinar" data-price="0">Webinar Tematik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="price" class="col-sm-4 col-form-label">Jumlah yang dibayarkan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}" readonly>
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
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const classSelect = document.getElementById('class');
        const priceInput = document.getElementById('price');

        classSelect.addEventListener('change', function () {
            const selectedOption = classSelect.options[classSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price;
        });
    });
</script>
@endsection