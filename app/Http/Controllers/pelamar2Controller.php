<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\pelamar2;
use App\Gambar;
use App\cv2;
use App\sertifikat;
use Barryvdh\DomPDF\Facade as PDF;


class pelamar2Controller extends Controller
{
    //

    	public function storepel2(Request $request)
	{
	$request->session()->regenerateToken();
	$this->validate($request,[
		'nama' => 'required',
		'email' => 'required',
		'posisi' => 'required',
		'umur' => 'required|numeric|max:30|min:18',
		'alamat' => 'required',
		'tempat' => 'required',
		'tanggal' => 'required',
		'agama' => 'required',
		'kewarganegaraan' => 'required',
		'status' => 'required',
		'ktp' => 'required|numeric|digits:16',
		'telepon' => 'required|numeric',
		'pekerjaan' => 'required',
		'file' => 'required|file|image|mimes:jpeg,png,jpg|max:200',
		'cv' => 'required|mimetypes:application/pdf|max:200',
		'sertif' => 'mimetypes:application/pdf|max:200',
		//'g-recaptcha-response' => 'required|captcha',
		//'keterangan' => 'required',

	]);

	$belum = "Unprocessed";
	pelamar2::create([
		'nama' => $request->nama,
		'email' => $request->email,
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
		'keterangan' => $belum,
	]);


	/*$belum = "belum_dipanggil";
	// insert data ke table pelamar
	DB::table('pelamar')->insert([
		'nama' => $request->nama,
		'email' => $request->email,
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
		'keterangan' => $belum,
	]);*/

	//$pake = $request->only(['nama']);
	//$id = $pake['nama'];

	//$this->validate($request, [
			//'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			//'keterangan' => 'required',
		//]);
 
		$foto = $request->only(['file','keterangan']);
		$vitae = $request->only(['cv']);
		$sert = $request->only(['sertif']);
		// menyimpan data file yang diupload ke variabel $file
		
		$file = $foto['file'];
		$file_cv = $vitae['cv'];


		
		
		$nama_file = time()."_".$file->getClientOriginalName();
		$nama_cv = time()."_".$file_cv->getClientOriginalName();
		
      	        //isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$tujuan_cv = 'data_cv';
		

		$file->move($tujuan_upload,$nama_file);
		$file_cv->move($tujuan_cv,$nama_cv);
		
 		
 		//$id_pel = DB::select('select id from pelamar where id = :id', ['id' => $nama]);
		$id_pel = DB::table('pelamar2')->max('id');
		
		Gambar::create([
			'file' => $nama_file,
 			'pelamar_id' => $id_pel,
		]);

 		/*DB::table('gambar')->insert([
 			'file' => $nama_file,
 			'pelamar_id' => $id_pel,
 		]);
		*/
		$id_pela = pelamar2::find($id_pel);
		
		cv2::create([
			'pelamar_id' => $id_pel,
			'file_cv' => $nama_cv,
		]);
 		
 		/*DB::table('cv')->insert([
 			'file_cv' => $nama_cv,
 			'pelamar_id' =>$id_pel,
 		]);*/

 		if ($request->hasfile('sertif')) {
			# code...
			$file_sertif = $sert['sertif'];
			$nama_sertif = time()."_".$file_sertif->getClientOriginalName();
			$tujuan_sertif = 'data_sertif';
			$file_sertif->move($tujuan_sertif,$nama_sertif);

			sertifikat::create([
			'file_sertifikat' => $nama_sertif,
 			'pelamar_id' => $id_pel,
			]);

			/*DB::table('sertifikat')->insert([
 			'file_sertifikat' => $nama_sertif,
 			'pelamar_id' =>$id_pel,
 			]);*/
		};

 	

 	$iddata = Crypt::encrypt($id_pel);
		//gambar::create([
		//	'file' => $nama_file,
		//	'pelamar_id' => $id_pel,
				//'keterangan' => $foto['keterangan'],
		//]);
 	$isidata = Crypt::decrypt($iddata);

	//proses_upload($foto);
 	$data = $request->all();
	 	 
	// alihkan halaman ke halaman pelamar
	//return view('/data-pel', ['pel' => $data]);
	return redirect("/data/$iddata");	


		//gambar::create([
		//	'file' => $nama_file,
		//	'pelamar_id' => $id_pel,
				//'keterangan' => $foto['keterangan'],
		//]);


	//proses_upload($foto);
 	//$data = $request->all();
	 	 
	// alihkan halaman ke halaman pelamar
	//return view('/data-pel', ['pel' => $data]);
	//return redirect("/data/$id_pel");
 	//return redirect('/');
	}

}
