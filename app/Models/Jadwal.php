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
        'tgl_mulai',
        'tgl_selesai',
        'lokasi',
    ];
    
    /**
     * Relasi ke model Laporan
     */
    public function pertumbuhan()
    {
        return $this->hasMany(Pertumbuhan::class, 'id_jadwal');
    }

}
