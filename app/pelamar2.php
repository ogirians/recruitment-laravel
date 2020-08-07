<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class pelamar2 extends Model
{
    //
    protected $table = "pelamar2";

    protected $fillable = ['nama','email', 'posisi', 'umur', 'alamat', 'tempat', 'tanggal', 'agama', 'kewarganegaraan', 'status', 'ktp', 'telepon', 'pekerjaan','keterangan',];
    

     public function gambar()
    {
    	return $this->hasOne('App\Gambar', 'App\cv2', 'App\sertifikat');
    }
     
     public function cv2()
    {
    	return $this->hasOne('App\cv2');
    }
      
      public function sertifikat()
    {
    	return $this->hasOne('App\sertifikat');
    }
}

