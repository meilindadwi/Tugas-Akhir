@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="/inputdata" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="namaHelp">
                    </div>
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label">Pengalaman</label>
                        <input type="text" name="pengalaman" class="form-control" id="pengalaman" aria-describedby="pengalamanHelp">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsiHelp">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Masukkan Foto</label>
                        <input type="file" name="foto" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection