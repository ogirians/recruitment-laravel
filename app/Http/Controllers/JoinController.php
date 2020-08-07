<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use DB;
//use Illuminate\Support\Facades\DB;
use PDF;

class JoinController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$data = DB::table('pelamar2')
		
			->join('gambar', 'pelamar_id', '=', 'pelamar2.id')
			->where('pelamar2.keterangan', '=', 'On Proses')
			->get();	

		//return view('join', compact('data'));
		return view('join', ['data' => $data]);
	}


	 public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pelamar sesuai pencarian data
		$data = DB::table('pelamar2')

		->where('nama','like',"%".$cari."%")
			->join('gambar', 'gambar.id', '=', 'pelamar2.id')
			->select('pelamar2.id','pelamar2.nama','pelamar2.posisi', 'pelamar2.umur', 'pelamar2.alamat', 'pelamar2.tempat', 'pelamar2.tanggal', 'pelamar2.agama', 'pelamar2.kewarganegaraan', 'pelamar2.status', 'pelamar2.ktp', 'pelamar2.ktp', 'pelamar2.telepon', 'pelamar2.pekerjaan', 'gambar.file', 'pelamar2.keterangan')
			->get();

    		// mengirim data pegawai ke view index
		return view('cari-pel', compact('data'));

	}

	public function lembaran2(request $request)
	{
		$cari = $request->cari;
		$pelamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->where('nama','like',"%".$cari."%")
		->get();

		return view('cari-pel', ['pel' => $pelamar]);
	}

	public function onproses()
	{
		
		$pelamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->where('pelamar2.keterangan', '=', 'On Proses')
		->get();

		return view('join', ['pel' => $pelamar]);
	}


	public function cetak_pdf()
    {
    	
    	$data = DB::table('pelamar')
		
    		->join('gambar', 'gambar.id', '=', 'pelamar.id')
			->select('pelamar.nama','pelamar.posisi', 'pelamar.umur', 'pelamar.alamat', 'pelamar.tempat', 'pelamar.tanggal', 'pelamar.agama', 'pelamar.kewarganegaraan', 'pelamar.status', 'pelamar.ktp', 'pelamar.ktp', 'pelamar.telepon', 'pelamar.pekerjaan', 'gambar.file', 'pelamar.keterangan')
			->get();
			$pdf = PDF::loadview('join_pdf', compact('data'));
    		//$data = Pegawai::all();
 
    	return $pdf->download('pelamar-pdf');
    }

//		public function index()
//    {
//    	$pegawai = DB::table('pegawai');
//    	return view('pegawai',['pegawai'=>$pegawai]);
//    }
 
//    public function cetak_pdf()
//    {
//    	$pegawai = DB::table('pegawai');
 
 //   	$pdf = PDF::loadview('pegawai_pdf',['pegawai'=>$pegawai]);
   // 	return $pdf->download('laporan-pegawai-pdf');
   // }
    
    public function getDownloadCv($cv,$nama)

	{

    //PDF file is stored under project/public/download/info.pdf
		
		/*$nama = DB::table('pelamar2')
		->join('cv2','cv2.pelamar_id','=','pelamar2.id')
		->select('cv2.file_cv')
		->where('pelamar2.id',$id)->get();*/
		


	//$name = DB::table('cv2')->where('pelamar_id', $id)->value('file_cv');
	//$name = $nama['file_cv'];	
	
    $file=public_path()."/data_cv/".$cv ;

 

	$headers = [
              'Content-Type' => 'application/pdf',
           ];
	return response()->download($file, 'CV_'.$nama.'.pdf', $headers);

}

   public function getDownloadSert($sert,$nama)

	{

    //PDF file is stored under project/public/download/info.pdf
		
		/*$nama = DB::table('pelamar2')
		->join('cv2','cv2.pelamar_id','=','pelamar2.id')
		->select('cv2.file_cv')
		->where('pelamar2.id',$id)->get();*/
		


	//$name = DB::table('cv2')->where('pelamar_id', $id)->value('file_cv');
	//$name = $nama['file_cv'];	
	
    $file=public_path()."/data_sertif/".$sert ;

 

	$headers = [
              'Content-Type' => 'application/pdf',
           ];
	return response()->download($file, 'Sertif_'.$nama.'.pdf', $headers);

}

	public function notin($id)
	{

	DB::table('pelamar2')->where('id',$id)->update([

		'keterangan' => 'not qualified',


	
	]);

	return redirect()->back();

	}

	public function in($id)
	{
	DB::table('pelamar2')->where('id',$id)->update([

		'keterangan' => 'qualified'
		
	]);

	return redirect()->back();
	}

	public function hapusjoin($id)
	{
	DB::table('pelamar2')->where('id',$id)->update([

		'keterangan' => 'Unprocessed'
		
	]);

	return redirect()->back();

	}



	public function show()
	{
		$data = DB::table('pelamar2')
		
			->join('gambar', 'pelamar_id', '=', 'pelamar2.id')
			->where('pelamar2.keterangan', '=', 'qualified')
			->get();	

		//return view('join', compact('data'));
		return view('qualified', ['data' => $data]);
	}


}
?>