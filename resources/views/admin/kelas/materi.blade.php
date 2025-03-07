@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <a href="/tambahmateri" class="btn btn-primary mb-3">+ Tambah Materi NIH</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                    <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->deskripsi_materi }}</td>
                            <td>
                            {{ $row->video_materi }}
                           
                            </td>
                            <td>
                                <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="/delete/{{ $row->id }}" type="button" class="btn btn-danger">Delete</a>
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