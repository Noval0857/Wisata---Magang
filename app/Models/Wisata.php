<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Wisata extends Model
{
    protected $table = 'wisatas';
    protected $primaryKey = 'id'; // Specify the primary key
    public $timestamps = false; // If your table has timestamps, ensure this is true

    protected $fillable = [
        'nama_wisata', 'category_id', 'deskripsi', 'alamat', 'google_maps_url'
    ];

    public function fotoWisata()
    {
        return $this->hasMany(FotoWisata::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
