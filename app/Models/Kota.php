<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = "kota";

    protected $fillable = [
        'name',
        'description',
        'wilayah_id'
    ];

    public function wilayah() {
        return $this->belongsTo('App\Models\Wilayah', 'id_wilayah');
    }

    public function pegawai() {
        return $this->hasOne('App\Models\Employee', 'wilayah_id');
    }
}
