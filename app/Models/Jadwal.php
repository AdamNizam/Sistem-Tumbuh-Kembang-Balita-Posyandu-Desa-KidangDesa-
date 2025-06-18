<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'kegiatan',
        'tanggal',
        'lokasi',
    ];
    
    /**
     * Relasi ke model Laporan
     */
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_jadwal');
    }

}
