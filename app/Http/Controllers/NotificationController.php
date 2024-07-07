<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        // Dapatkan semua notifikasi pengguna yang login
        $notifications = auth()->user()->notifications;

        // Tandai semua notifikasi sebagai telah dibaca
        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        // Dapatkan notifikasi tertentu
        $notification = DatabaseNotification::find($id);

        return view('notifications.show', compact('notification'));
    }
}