<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Gambar;
use Barryvdh\DomPDF\Facade as PDF; 
 
class BlogController extends Controller
{
 
	public function home(){
		return view('home');
	}
 
	public function tentang(){
		return view('tentang');
	}
 
	public function kontak(){
		return view('kontak');
	}

	public function career(){
		return view('career');
	}

	public function isi()
    {
        //return view('career');
        // mengambil data dari table lowongan
        
        //
        //$lowongan = DB::table('lowongan')->get();
        $lowongan = DB::table('lowongan')->paginate(10)->where('status','=','Open');
 
        // mengirim data lowongan ke view index
        return view('isi',['lowongan' => $lowongan]);
    }



    	public function opsi()
    {
        //return view('career');
        // mengambil data dari table lowongan
        
        //
        //$lowongan = DB::table('lowongan')->get();
        $lowongan = DB::table('lowongan')->paginate(10)->where('status','=','Open');
 
        // mengirim data lowongan ke view index
        return view('form',['lowongan' => $lowongan]);
    }



   public function upload(){
		$gambar = gambar::get();
		return view('/form',['gambar' => $gambar]);
	}
 
	public function proses_upload($request){
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
 
		gambars::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]);
 
		return redirect()->back();
	}


	
	public function storepel(Request $request)
	{
	$request->session()->regenerateToken();
	$this->validate($request,[
		'nama' => 'required',
		'email' => 'required',
		'posisi' => 'required',
		'umur' => 'required|numeric|max:25|min:18',
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

	$belum = "-";
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
	]);

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
		$id_pel = DB::table('pelamar')->max('id');

 		DB::table('gambar')->insert([
 			'file' => $nama_file,
 			'pelamar_id' => $id_pel,
 		]);

 		DB::table('cv')->insert([
 			'file_cv' => $nama_cv,
 			'pelamar_id' =>$id_pel,
 		]);

 		if ($sert != null) {
			# code...
			$file_sertif = $sert['sertif'];
			$nama_sertif = time()."_".$file_sertif->getClientOriginalName();
			$tujuan_sertif = 'data_sertif';
			$file_sertif->move($tujuan_sertif,$nama_sertif);

			DB::table('sertifikat')->insert([
 			'file_sertifikat' => $nama_sertif,
 			'pelamar_id' =>$id_pel,
 			]);
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






	public function storepel2(Request $request)
	{
	$request->session()->regenerateToken();
	$this->validate($request,[
		'nama' => 'required',
		'email' => 'required',
		'posisi' => 'required',
		'umur' => 'required|numeric|max:25|min:18',
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
		cv::create([
			'file_cv' => $nama_cv,
 			'pelamar_id' =>$id_pel,
		]);
 		
 		/*DB::table('cv')->insert([
 			'file_cv' => $nama_cv,
 			'pelamar_id' =>$id_pel,
 		]);*/

 		if ($sert != null) {
			# code...
			$file_sertif = $sert['sertif'];
			$nama_sertif = time()."_".$file_sertif->getClientOriginalName();
			$tujuan_sertif = 'data_sertif';
			$file_sertif->move($tujuan_sertif,$nama_sertif);

			sertifikat::create([
			'file_sertifikat' => $nama_sertif,
 			'pelamar_id' =>$id_pel,
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


	function index()
	{
		$data = DB::table('pelamar')
			->join('gambar', 'gambar.pelamar_id', '=', 'pelamar.id')
			->select('pelamar.nama','pelamar.posisi', 'gambar.file')
			->get();
		return view('join', compact('data'));
	}


	 public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pelamar sesuai pencarian data
		$data = DB::table('pelamar')
		->where('nama','like',"%".$cari."%")
			->join('gambar', 'gambar.pelamar_id', '=', 'pelamar.id')
			->select('pelamar.nama','pelamar.posisi', 'gambar.file')
			->get();

    		// mengirim data pegawai ke view index
		return view('join', compact('data'));

	}

	public function lembaran($iddata)
	{
		$id = Crypt::decrypt($iddata);
		$pelamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->where('pelamar2.id',$id)->get();

		return view('data-pel', ['pel' => $pelamar]);
	}


	public function cetak_pdf($id)
	{

		$pelaamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id','=','pelamar2.id')
		->where('pelamar2.id',$id)->get();

		

		$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('pelamar_pdf',['pel'=> $pelaamar])->setPaper('legal');

		return $pdf->download('data_pelamar.pdf');

	}
	

}
