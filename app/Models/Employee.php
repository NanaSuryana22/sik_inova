<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        'user_id',
        'id_card',
        'alamat',
        'wilayah_id',
        'kota_id',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'photo'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function wilayah() {
        return $this->belongsTo('App\Models\Wilayah', 'wilayah_id');
    }

    public function kota() {
        return $this->belongsTo('App\Models\Kota', 'kota_id');
    }
}
