<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['judul', 'harga', 'deskripsi'];
    public function getUrlAttribute()
    {
    switch ($this->judul) {
        case 'New Islamic Healing':
            return '/upmateri';
        case 'Pre Marriage Healing':
            return '/upmateripmh';
        case 'Webinar Tematik':
            return '/upwebinar';
        default:
            return '/default-url';
        }
    }
}
