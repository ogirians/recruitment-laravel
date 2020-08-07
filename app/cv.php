<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    protected $table = "cv";

    protected $fillable = ['nama', 'posisi', 'umur', 'alamat', 'tempat', 'tanggal', 'agama', 'kewarganegaraan', 'status', 'ktp', 'telepon', 'pekerjaan', 'keterangan','file_cv'];
}


class File extends Model
{
    protected $table = "cv";

    public function pelamar()
    {
    	return $this->belongsTo('App\Pelamar2');
    }
}