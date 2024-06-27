@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <a href="/tambahkonselor" class="btn btn-primary mb-3">+ Tambah Konselor</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Pengalaman</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($konselor as $row)
                    <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->pengalaman }}</td>
                    <td>{{ $row->deskripsi }}</td>
                    <td>
                        <img src="{{ asset('fotokonselor/'.$row->foto) }}" alt="" style="width: 40px;">
                    </td>
                            <td>
                                <a href="/tampildata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="/deletedata/{{ $row->id }}" type="button" class="btn btn-danger">Delete</a>
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