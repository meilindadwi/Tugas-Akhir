<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
        'notes',
        'payment_proof',
        'consultation_method',
        'status',
        'user_id',
        'price'
    ];

    // Definisikan relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
