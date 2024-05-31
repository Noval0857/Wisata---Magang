<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoWisata extends Model
{
    use HasFactory;

    protected $fillable = ['id_wisata','nama_foto_wisata', 'path'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }
}
