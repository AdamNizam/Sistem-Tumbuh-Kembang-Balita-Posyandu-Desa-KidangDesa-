<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balita extends Model
{

    use HasFactory;

    protected $table = 'balita';

    protected $fillable = [
        'nama_balita',
        'jenis_kelamin',
        'tanggal_lahir',
        'nama_orang_tua',
        'umur',
        'alamat',
    ];

     /**
     * Relasi ke model Pertumbuhan
     */
    public function pertumbuhan()
    {
        return $this->hasMany(Pertumbuhan::class, 'id_balita');
    }

     /**
     * Relasi ke model Laporan
     */
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_balita');
    }


}
