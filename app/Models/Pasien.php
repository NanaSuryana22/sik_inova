<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = "pasien";

    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_handphone',
        'alamat'
    ];

    public function pendaftarans() {
        return $this->hasMany('App\Models\Pendaftaran', 'pasien_id');
    }
}
