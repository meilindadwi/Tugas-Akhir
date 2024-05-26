@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Payment Form</h1>
@endsection

@section('content')
<div class="untree_co-section">
    <div class="container">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0"></div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
            <div class="col-sm-10">
                <input type="file" name="pembayaran" class="form-control" id="pembayaran" value="{{ old('pembayaran') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection