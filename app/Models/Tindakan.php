<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $table = "tindakan";

    protected $fillable = [
        'name',
        'description',
        'harga'
    ];

    public function pengobatan_details() {
        return $this->hasMany('App\Models\PengobatanDetail', 'tindakan_id');
    }
}
