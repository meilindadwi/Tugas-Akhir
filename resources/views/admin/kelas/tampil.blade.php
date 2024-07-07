@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updatedata', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="video_materi" class="form-label">Materi</label>
                        <input type="file" name="video_materi" class="form-control" id="video_materi" aria-describedby="videoHelp">
                        @if($data->video_materi)
                            <video width="320" height="240" controls>
                                <source src="{{ asset('storage/' . $data->video_materi) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection