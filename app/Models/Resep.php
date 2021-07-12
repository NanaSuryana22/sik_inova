<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = "resep";

    protected $fillable = [
        'pengobatan_id',
        'obat_id',
        'harga_obat',
        'jumlah_obat',
        'dosis',
        'keterangan'
    ];

    public function pengobatan() {
        return $this->belongsTo('App\Models\Pengobatan', 'pengobatan_id');
    }

    public function obat() {
        return $this->belongsTo('App\Models\Obat', 'obat_id');
    }
}
