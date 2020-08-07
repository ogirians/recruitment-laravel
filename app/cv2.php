<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class cv2 extends Model
	{
    //
    protected $table = "cv2";

    protected $fillable = ['nama','email', 'posisi', 'umur', 'alamat', 'tempat', 'tanggal', 'agama', 'kewarganegaraan', 'status', 'ktp', 'telepon', 'pekerjaan', 'keterangan','pelamar_id','file_cv'];
	}


class File3 extends Model
{
    protected $table = "cv2";

    public function pelamar()
    {
    	return $this->belongsTo('App\Pelamar');
    }
    public function pelamar2()
    {
    	return $this->belongsTo('App\pelamar2');
    }
}
