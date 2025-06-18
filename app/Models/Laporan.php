<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'periode',
        'isi_laporan',
        'id_balita',
        'id_pertumbuhan',
        'id_jadwal',
    ];

    /**
     * Relasi ke Balita
     */
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }

    /**
     * Relasi ke Pertumbuhan
     */
    public function pertumbuhan()
    {
        return $this->belongsTo(Pertumbuhan::class, 'id_pertumbuhan');
    }

    /**
     * Relasi ke Jadwal
     */
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
