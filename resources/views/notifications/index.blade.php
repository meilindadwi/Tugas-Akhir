@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Notifications</h1>
        <ul>
            @foreach($notifications as $notification)
                <li>
                    <a href="{{ route('notifications.show', $notification->id) }}">
                        {{ $notification->data['message'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
