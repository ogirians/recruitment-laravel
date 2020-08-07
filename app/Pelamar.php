<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pelamar extends Model
{
    protected $table = "pelamar";

    protected $fillable = ['nama', 'posisi', 'umur', 'alamat', 'tempat', 'tanggal', 'agama', 'kewarganegaraan', 'status', 'ktp', 'telepon', 'pekerjaan'];
    

     public function gambar()
    {
    	return $this->hasOne('App\Gambar');
    }
}