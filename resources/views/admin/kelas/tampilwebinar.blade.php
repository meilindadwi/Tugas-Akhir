@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updatedatawebinar', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judulHelp" value="{{ $data->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_materi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi_materi" class="form-control" id="deskripsi_materi" aria-describedby="deskripsiHelp" value="{{ $data->deskripsi_materi }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" aria-describedby="fotoHelp">
                        @if($data->foto)
                            <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Webinar" style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $data->tanggal }}">
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="time" name="waktu" class="form-control" id="waktu" value="{{ $data->waktu }}">
                    </div>
                    <div class="mb-3">
                        <label for="pembicara" class="form-label">Pembicara</label>
                        <input type="text" name="pembicara" class="form-control" id="pembicara" value="{{ $data->pembicara }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection