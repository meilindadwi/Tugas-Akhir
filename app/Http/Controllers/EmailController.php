<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\Informasi;


class EmailController extends Controller
{
    public function notif()
    {
        $user = User::first();
        $data = [
            'line1' =>'Reservasi anda telah disetujui',
            'action' => 'Klik Ok',
            'line2' => 'Detail Reservasi',
        ];
        $user->notify(new Informasi($data));
    }
}
