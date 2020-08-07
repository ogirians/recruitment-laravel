<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Gambar;
use App\Pelamar;
use File;


class pelamarController extends Controller
{
	public function master()
	{
 
	// memanggil view tambah
	return view('master');
 
	}


 


   // method untuk menampilkan view form tambah pelamar
public function tambahpel()
{
 
	// memanggil view tambah
	return view('tambahpel');
 
}

// method untuk insert data ke table pelamar
public function storepel(Request $request)
{
	// insert data ke table pelamar
	DB::table('pelamar')->insert([
		'nama' => $request->nama,
		'posisi' => $request->posisi,
		'umur' => $request->umur,
		'alamat' => $request->alamat,
		'tempat' => $request->tempat,
		'tanggal' => $request->tanggal,
		'agama' => $request->agama,
		'kewarganegaraan' => $request->kewarganegaraan,
		'status' => $request->status,
		'ktp' => $request->ktp,
		'telepon' => $request->telepon,
		'pekerjaan' => $request->pekerjaan,
		'keterangan' => $request->keterangan
	]);
	// alihkan halaman ke halaman pelamar
	return redirect('/pelamar');

}

// method untuk edit data pelamar
public function editpel($id)
{
	// mengambil data pelamar berdasarkan id yang dipilih
	$pelamar = DB::table('pelamar')->where('id',$id)->get();
	// passing data pelamar yang didapat ke view edit.blade.php
	return view('editpel',['pelamar' => $pelamar]);

}	
// update data pelamar
public function updatepel(Request $request)
{
	// update data pelamar
	DB::table('pelamar')->where('id',$request->id)->update([
		
		'keterangan' => $request->keterangan
	]);
	// alihkan halaman ke halaman pelamar
	return redirect('/pelamar');
}

// method untuk hapus data pegawai
public function hapuspel($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('pelamar')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/pelamar');
}

public function upload(){
		$gambar = Gambar::get();
		return view('upload',['gambar' => $gambar]);
	}

	public function proses_upload(Request $request){
		
	
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		Gambar::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]);

		return redirect()->back();
	}

	public function hapus($id){
	// hapus file
	$gambar = Gambar::where('id',$id)->first();
	File::delete('data_file/'.$gambar->file);

	// hapus data
	Gambar::where('id',$id)->delete();

	return redirect()->back();
}

	 public function index()
    {
    	// mengambil semua data pengguna
    	$pelamar = pelamar::all();
    	$gambar = gambar::all();
    	// return data ke view
    	return view('pelamar', ['gambar' => $gambar], ['pelamar' => $pelamar]);
    }


}