@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Register</h1>
@endsection

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST">
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
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="time" class="col-sm-2 col-form-label">Time</label>
            <div class="col-sm-10">
                <input type="time" name="time" class="form-control" id="time" value="{{ old('time') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="notes" class="col-sm-2 col-form-label">Notes</label>
            <div class="col-sm-10">
                <textarea name="notes" class="form-control" id="notes">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection