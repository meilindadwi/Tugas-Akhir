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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Metode Konseling</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Catatan</th>
                            <th>Harga</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->consultation_method }}</td>
                                <td>{{ $reservation->date }}</td>
                                <td>{{ $reservation->time }}</td>
                                <td>{{ $reservation->notes }}</td>
                                <td>{{ $reservation->price }}</td>
                                <td>
                                @if ($reservation->payment_proof)
                                    <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank">View</a>
                                @else
                                    No proof
                                @endif
                                </td>
                                <td>{{ $reservation->status }}</td>
                                <td>
                                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST" style="margin-top: 5px;">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-danger">Reject</button>
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