<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
      
        'id_pertumbuhan',
    ];
    /**
     * Relasi ke Pertumbuhan
     */
    public function pertumbuhan()
    {
        return $this->belongsTo(Pertumbuhan::class, 'id_pertumbuhan');
    }


}
