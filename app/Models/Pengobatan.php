<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengobatan extends Model
{
    use HasFactory;

    protected $table = "pengobatan";

    protected $fillable = [
        'pendaftaran_id',
        'pasien_id',
        'total_biaya_pengobatan',
        'status_pembayaran',
        'tanggal_pembayaran'
    ];

    public function pendaftaran() {
        return $this->belongsTo('App\Models\Pendaftaran', 'pendaftaran_id');
    }

    public function pasien() {
        return $this->belongsTo('App\Models\Pasien', 'pasien_id');
    }

    public function pengobatan_details() {
        return $this->hasMany('App\Models\PengobatanDetail', 'pengobatan_id');
    }

    public function reseps() {
        return $this->hasMany('App\Models\Resep', 'pengobatan_id');
    }
}
