@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.safari.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="foto" class="form-label">Pilih Foto</label>
            <input type="file" name="foto" class="form-control" id="foto" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Foto</button>
    </form>
    </div>
        </div>
    </div>
</div>
@endsection
