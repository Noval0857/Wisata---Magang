<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisatas extends Model
{
    public $timestamps = true;
    protected $fillable = ['nama_tempat','lokasi','deskripsi','gambar','komentar'];
}
