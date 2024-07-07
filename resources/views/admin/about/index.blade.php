@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('about.create') }}" class="btn btn-primary mb-3">+ Tambah Blog</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @php
                        $no = 1;
                    @endphp
            @foreach ($abouts as $about)
            <tr>
            <th scope="row">{{ $no++ }}</th>
                <td>{{ $about->judul }}</td>
                <td>
                    @if ($about->foto)
                    <img src="{{ Storage::url($about->foto) }}" alt="Foto About" style="max-width: 100px;">
                    @else
                    (No Image)
                    @endif
                </td>
                <td>{{ $about->deskripsi }}</td>
                <td>
                    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        </div>
    </div>
</div>
@endsection