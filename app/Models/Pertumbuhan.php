<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pertumbuhan extends Model
{
     use HasFactory;

    protected $table = 'pertumbuhan';

    protected $fillable = [
        'id_balita', 
        'berat_badan',
        'tinggi_badan',
        'id_jadwal',
        'lingkar_kepala',
        'tanggal_input',
        'catatan',
        'kategori_pertumbuhan'
    ];

    /**
     * Relasi ke model Balita
    */
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }
    
     /**
     * Relasi ke model Laporan
     */
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_pertumbuhan');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

}
