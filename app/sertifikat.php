<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class sertifikat extends Model
{
    //
     protected $table = "sertifikat";

    protected $fillable = ['nama','email', 'posisi', 'umur', 'alamat', 'tempat', 'tanggal', 'agama', 'kewarganegaraan', 'status', 'ktp', 'telepon', 'pekerjaan','keterangan','file_sertifikat','pelamar_id'];
}

class File2 extends Model
{
  	protected $table = "sertifikat";

    public function pelamar()
    {
    	return $this->belongsTo('App\Pelamar');
    }
    public function pelamar2()
    {
    	return $this->belongsTo('App\pelamar2');
    }
}