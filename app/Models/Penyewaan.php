<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $table = 'penyewaan';
    protected $primaryKey = 'id_penyewaan';

    public function nama_mobil(){
        return $this->belongsTo('App\Models\Mobil', 'id_mobil', 'id_mobil');
    }
}
