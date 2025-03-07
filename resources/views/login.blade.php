@extends('layouts.main')

@section('container')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Login</h1>
@endsection

@section('content')
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="" method="POST">
          @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div> 
    </div>
</body>
@endsection