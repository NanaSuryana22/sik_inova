<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = "obat";

    protected $fillable = [
        'name',
        'description',
        'harga'
    ];

    public function reseps() {
        return $this->hasMany('App\Models\Resep', 'pengobatan_id');
    }
}
