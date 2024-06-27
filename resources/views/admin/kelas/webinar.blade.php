@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
            <a href="/tambahmateriwebinar" class="btn btn-primary mb-3">+ Tambah Materi</a>
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Pembicara</th>
                            <th scope="col">Brosur</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->deskripsi_materi }}</td>
                            <td>{{ $row->tanggal }}</td>
                            <td>{{ $row->waktu }}</td>
                            <td>{{ $row->pembicara }}</td>
                            <td>
                            {{ $row->foto }}
                            </td>
                            <td>
                                <a href="/tampilkandatawebinar/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="/deletewebinar/{{ $row->id }}" type="button" class="btn btn-danger">Delete</a>
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