<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function foto(){
        return $this->hasMany('App\Models\Foto_pengaduan');
    }
}
