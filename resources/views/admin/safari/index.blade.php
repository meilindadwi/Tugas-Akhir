@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
    <a href="{{ route('admin.safari.create') }}" class="btn btn-primary">+ Tambah Foto</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($safaris as $safari)
                <tr>
                    <td><img src="{{ Storage::url($safari->foto) }}" alt="Foto Safari" width="100"></td>
                    <td>
                        <form action="{{ route('admin.safari.destroy', $safari->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
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
