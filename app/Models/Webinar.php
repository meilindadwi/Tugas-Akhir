<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    protected $table = 'webinar';
    protected $fillable = ['judul', 'deskripsi_materi', 'tanggal', 'waktu', 'pembicara', 'foto'];
    protected $dates = ['tanggal'];
}
