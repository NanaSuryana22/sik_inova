<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftaran";

    protected $fillable = [
        'pasien_id',
        'tanggal_daftar',
        'keluhan_pasien',
        'no_pasien',
        'status'
    ];

    public function pasien() {
        return $this->belongsTo('App\Models\Pasien', 'pasien_id');
    }
}
