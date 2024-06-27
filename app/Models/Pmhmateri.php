<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmhmateri extends Model
{
    use HasFactory;
    protected $table = 'pmhmateris';
    protected $fillable = ['judul', 'deskripsi_materi', 'video_materi'];
}
