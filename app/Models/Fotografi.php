<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotografi extends Model
{
    public const GENRES = [
        'STREET',
        'PORTRAIT',
        'LANDSCAPE',
        'ARCHITECTURE',
    ];
    
    protected $fillable = ['foto', 'foto_original', 'genre', 'nama_foto', 'deskripsi', 'kamera', 'zoom', 'aperture', 'shuterspeed', 'iso', 'lokasi', 'tanggal'];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }
}
