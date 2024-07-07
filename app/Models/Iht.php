<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iht extends Model
{
    use HasFactory;
    protected $table = 'iht';
    protected $fillable = ['judul', 'harga', 'deskripsi'];

}
