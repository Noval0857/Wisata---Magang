<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoWisata extends Model
{
    use HasFactory;

    protected $table = 'foto_wisatas'; // Ensure this is the correct table name

    protected $primaryKey = 'id';

    protected $fillable = ['wisata_id', 'nama_foto_wisata', 'path'];
    
    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
