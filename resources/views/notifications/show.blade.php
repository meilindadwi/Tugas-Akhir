@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notification Detail</h1>
        <p>{{ $notification->data['message'] }}</p>
        <a href="{{ route('notifications.index') }}">Back to all notifications</a>
    </div>
@endsection
