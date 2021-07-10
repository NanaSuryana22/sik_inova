<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = "wilayah";

    protected $fillable = [
        'name',
        'description'
    ];

    public function kotas() {
        return $this->hasMany('App\Models\Kota', 'id_wilayah');
    }

    public function pegawai() {
        return $this->hasOne('App\Models\Employee', 'wilayah_id');
    }
}
