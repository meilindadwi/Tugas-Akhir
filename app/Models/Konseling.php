<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;
    protected $table = 'konseling';
    protected $fillable = ['judul', 'harga', 'deskripsi'];
    public function getUrlAttribute()
    {
    switch ($this->judul) {
        case 'Konseling online via DM Instagram':
            return '/notedm';
        case 'Konseling Online Via Videocall WhatsApp':
            return '/notevc';
        case 'Konseling Offline (Tatap Muka)':
            return '/notetm';
        default:
            return '/default-url';
        }
    }
}
