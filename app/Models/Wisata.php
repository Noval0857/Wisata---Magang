<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Wisata extends Model
{
    protected $table = 'wisatas';
    protected $primaryKey = 'id_wisata'; // Specify the primary key
    public $timestamps = false; // If your table has timestamps, ensure this is true

    protected $fillable = [
        'nama_wisata', 'deskripsi', 'alamat'
    ];
}
