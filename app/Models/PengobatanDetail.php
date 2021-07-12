<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengobatanDetail extends Model
{
    use HasFactory;

    protected $table = "pengobatan_detail";

    protected $fillable = [
        'pengobatan_id',
        'tindakan_id',
        'biaya_tindakan',
        'keterangan'
    ];

    public function pengobatan() {
        return $this->belongsTo('App\Models\Pengobatan', 'pengobatan_id');
    }

    public function tindakan() {
        return $this->belongsTo('App\Models\Tindakan', 'tindakan_id');
    }
}
