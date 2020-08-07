<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = "gambar";

    protected $fillable = ['nama','email', 'posisi', 'umur', 'alamat', 'tempat', 'tanggal', 'agama', 'kewarganegaraan', 'status', 'ktp', 'telepon', 'pekerjaan', 'file','keterangan','pelamar_id'];
}


class File extends Model
{
    protected $table = "gambar";

    public function pelamar()
    {
    	return $this->belongsTo('App\Pelamar');
    }

    public function pelamar2()
    {
    	return $this->belongsTo('App\pelamar2');
    }
}