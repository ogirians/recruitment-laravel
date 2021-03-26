<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\Invitation_no_reply;
use Illuminate\Support\Facades\Mail;
use App\Gambar;
use PDF;
use Illuminate\Support\Facades\Session;

class lowonganController extends Controller



{

	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function masuk()
    {
        return view('lowongan');
    }


   public function master()
{
 
	// memanggil view tambah
	return view('master');
 
}
    public function index()
{
 
	// memanggil view index
	return view('index');
 
}
    public function home()
    
    {
    	//return view('career');
    	// mengambil data dari table lowongan
    	//$lowongan = DB::table('lowongan')->get();
    	$lowongan = DB::table('lowongan')->paginate(10);
 
    	// mengirim data lowongan ke view index
    	return view('isi',['lowongan' => $lowongan]);
    }
    public function inputlow()
    {
    	//return view('career');
    	// mengambil data dari table lowongan
    	//$lowongan = DB::table('lowongan')->get();
    	$lowongan = DB::table('lowongan')->paginate(10);
 
    	// mengirim data lowongan ke view index
    	return view('inputlow',['lowongan' => $lowongan]);
    }


    public function tambah()
{
 
	// memanggil view tambah
	return view('tambah');
 
}

// method untuk insert data ke table lowongan
public function store(Request $request)
{
	$this->validate($request,[
		'file_low' => 'required|file|image|mimes:jpeg,png,jpg|max:200',
	]);	


	$file1 = $request->only(['file_low']);
	$file_low = $file1['file_low'];
	// insert data ke table lowongan

	$nama_file = time()."_".$file_low->getClientOriginalName();
	$tujuan_low = 'data_low';
	$file_low->move($tujuan_low,$nama_file);
	
	DB::table('lowongan')->insert([
		'lowongan' => $request->lowongan,
		'status' => $request->status,
		'lokasi' => $request->lokasi,
		'file_low' => $nama_file,
	]);
	// alihkan halaman ke halaman lowongan
	return redirect('/inputlow');

}



// method untuk edit data lowongan
public function editlow($id)
{
	// mengambil data lowongan berdasarkan id yang dipilih
	$lowongan = DB::table('lowongan')->where('lowongan_id',$id)->get();
	// passing data lowongan yang didapat ke view edit.blade.php
	return view('editlow',['lowongan' => $lowongan]);
 
}

// update data lowongan
public function update(Request $request)
{
    $file1 = $request->only(['file_low']);
	$file_low = $file1['file_low'];
    
    if ($file_low == null) {
        
         DB::table('lowongan')->where('lowongan_id',$request->id)->update([
		'lowongan' => $request->lowongan,
		'status' => $request->status,
		'lokasi' => $request->lokasi,
        ]);
        
    
    } else {
        
        $this->validate($request,[
		'file_low' => 'file|image|mimes:jpeg,png,jpg|max:200',
    	]);	
    	
        $file_low = $file1['file_low'];
    	// insert data ke table lowongan
    	
    	$nama_file = time()."_".$file_low->getClientOriginalName();
    	$tujuan_low = 'data_low';
    	$file_low->move($tujuan_low,$nama_file);
    	
    	// update data lowongan
    	DB::table('lowongan')->where('lowongan_id',$request->id)->update([
    		'lowongan' => $request->lowongan,
    		'status' => $request->status,
    		'lokasi' => $request->lokasi,
    		'file_low' => $nama_file,
    	]);
	
       
    }


	// alihkan halaman ke halaman lowongan
	return redirect('/inputlow');
}
// method untuk hapus data lowongan


public function hapus($id)
{
	// menghapus data lowongan berdasarkan id yang dipilih
	DB::table('lowongan')->where('lowongan_id',$id)->delete();
		
	// alihkan halaman ke halaman lowongan
	return redirect('/inputlow');
}
		public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table lowongan sesuai pencarian data
		$lowongan = DB::table('lowongan')
		->where('lowongan','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data lowongan ke view index
		return view('inputlow',['lowongan' => $lowongan]);
 
	}

public function combo() {
      $katdb = ibirec::lowongan('lowongan_id', 'lowongan');
      return View::make('combo')->with('dcom', $katdb);
    }











	// controler pelamar///////////////////////////////////////////////////////////////////////////////////

	  public function pelamar()
    {
    	// mengambil data dari table pelamar
    	//$pelamar = DB::table('pelamar')->get();

    	$data = DB::table('pelamar')
		
			->join('gambar', 'gambar.id', '=', 'pelamar.id')
			->select('pelamar.id','pelamar.nama','pelamar.posisi', 'pelamar.umur', 'pelamar.alamat', 'pelamar.tempat', 'pelamar.tanggal', 'pelamar.agama', 'pelamar.kewarganegaraan', 'pelamar.status', 'pelamar.ktp', 'pelamar.ktp', 'pelamar.telepon', 'pelamar.pekerjaan', 'gambar.file', 'pelamar.keterangan')
			//->where('pelamar.keterangan', '=', 'On Proses')
			->get();

    	// mengirim data pelamar ke view index
    	//return view('pelamar',['pelamar' => $pelamar]);
    	return view('pelamar', compact('data'));
    }


    public function lembaran2()
	{
		
		$pelamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->orderBy('pelamar2.created_at')
		->where('keterangan',"Unprocessed")
		->get();
        
        $posisi = DB::table('lowongan')
        ->select('lowongan')
        ->where('status', 'Open')
        ->get();
        
        
	//	return view('pelamar', ['pel' => $pelamar]);
		
		 return view('pelamar', array(
        'pel' => $pelamar,
        'posisi' => $posisi,   
        ));
	}
	
	public function seen()
	{
		
		$pelamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->orderBy('pelamar2.created_at')
		->where('keterangan',"seen")
		->get();
        
        $posisi = DB::table('lowongan')
        ->select('lowongan')
        ->where('status', 'Open')
        ->get();
        
        
	//	return view('pelamar', ['pel' => $pelamar]);
		
		 return view('pelamar', array(
        'pel' => $pelamar,
        'posisi' => $posisi,   
        ));
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
		'pekerjaan' => $request->pekerjaan
	]);
	// alihkan halaman ke halaman pelamar
	return redirect('/');

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
		'pekerjaan' => $request->pekerjaan
	]);
	// alihkan halaman ke halaman pelamar
	return redirect('/pelamar');
}

// method untuk hapus data pegawai
public function hapuspel($id)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('pelamar2')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	Session::flash('deleted_message', 'pelamar telah dihapus');
	return redirect('/pelamar');
}

public function lembaran($id)
	{
      //  DB::table('pelamar2')->where('id',$request->id)->update
        DB::table('pelamar2')
              ->where('id', $id)
              ->update(['keterangan' => "seen"]);
        
		$pelamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->join('cv2','cv2.pelamar_id', '=', 'pelamar2.id')
		->leftjoin('sertifikat','sertifikat.pelamar_id', '=', 'pelamar2.id')
		->select('pelamar2.nama','pelamar2.posisi', 'pelamar2.umur', 'pelamar2.alamat', 'pelamar2.tempat', 'pelamar2.tanggal', 'pelamar2.agama', 'pelamar2.kewarganegaraan', 'pelamar2.status', 'pelamar2.ktp', 'pelamar2.ktp', 'pelamar2.telepon', 'pelamar2.pekerjaan', 'pelamar2.keterangan','gambar.file','cv2.file_cv','sertifikat.file_sertifikat','gambar.pelamar_id')
		->where('pelamar2.id',$id)->get();
		
		

		return view('detail', ['pel' => $pelamar]);
	}



	public function parah(Request $request)
	{
		/**$messages = [
		'date' => ':attribute salah',
    	'required' => ':attribute wajib isi',
    	'after_or_equal' => ':attribute salah, harus setelah tanggal mulai',
    	'string' => ':attribute harus huruf',
    	'integer' => ':attribute harus angka',

		];

		$this->validate($request,[
		'start_date' => 'nullable|date',
		'finish_date' => 'date|after_or_equal:start_date|nullable',
		'pos' => 'nullable|string',
		'old_min' => 'nullable|integer',
		'old_max' => 'nullable|integer',	
		],$messages);

		$pel = $request->only('start_date');
		**/

		$date = $request->only(['start_date']);
		$date2 = $request->only(['finish_date']);
		$posisi = $request->only(['pos']);
		$omin = $request->only(['old-min']);
		$omax = $request->only(['old-max']);


		$start = $date['start_date'];
		$end = $date2['finish_date'];
		$pos = $posisi['pos'];
		$old_min = $omin['old-min'];
		$old_max = $omax['old-max'];
		
		if ($start == null) {
			$hmm = DB::table('pelamar2')->min('created_at');
			$start = DB::table('pelamar2')->whereDate('created_at', '=', $hmm)->get();
		};

		if ($end == null) {		
			$end = DB::table('pelamar2')->max('created_at');
		};

		if ($pos == null) {
			$pos = 'none';
		};

		if ($old_min == null) {
			$old_min = DB::table('pelamar2')->min('umur');
		};


		if ($old_max == null) {
			$old_max = DB::table('pelamar2')->max('umur');
		};

		$start2 = date('2019-12-03');
		$end2 = date('2019-12-05');

		//$filter = $pelamar->where('created_at',[$start2,$end2]);

		return redirect("pelamar/filter/{$start}/{$end}/{$pos}/{$old_min}/{$old_max}");
	}


   public function filter($start,$end,$pos,$old_min,$old_max)
	{
    
     $posisi = DB::table('lowongan')
        ->select('lowongan')
        ->where('status', 'Open')
        ->get();


	if ($pos == 'none')
	{
		$pos = '';
	};
	
		$pelamar = DB::table('pelamar2')															
		->join('gambar','gambar.pelamar_id', '=', 'pelamar2.id')
		->whereDate('pelamar2.created_at', '>=', $start)
		->whereDate('pelamar2.created_at', '<=', $end)
		->where('pelamar2.posisi', 'like', "%".$pos."%")
		->whereBetween('pelamar2.umur',[$old_min,$old_max])
		->get();

		//$filter = $pelamar->where('created_at',[$start2,$end2]);

		//return view('pelamar', ['pel' => $pelamar]);
		
	    return view('pelamar', array(
        'pel' => $pelamar,
        'posisi' => $posisi,   
        ));
	}


	public function updatepel2(Request $request)
	{


	// update data pelamar

$id1 = $request->only(['id']);
	$nama1 = $request->only(['nama']);
	$email1 = $request->only(['email']);
	$waktu1 = $request->only(['waktu']);
	$jam1 = $request->only(['jam']);
	$tempat1 = $request->only(['tempat']);

	$id = $id1['id'];
	$nama = $nama1['nama'];
	$email = $email1['email'];
	$waktu = $waktu1['waktu'];
	$jam = $jam1['jam'];
	$tempat = $tempat1['tempat'];

	$data = [
		'nama' => $request->nama,
		'waktu' => $request->waktu,
		'tempat' => $request->tempat,
		'jam' => $request->jam,
	];



	

	Mail::to($email)->send(new Invitation_no_reply($data));
	// alihkan halaman ke halaman pelamar
	
	
	
	DB::table('pelamar2')->where('id',$id)->update([
		
	'keterangan' => 'On Proses',
	'tanggal_int' => $waktu,
	'jam_int' => $jam,

	]);
	
    $message="email terikirim";
    
    
    Session::flash('created_message', 'Email akan Dikirim');
    return back();
	//return redirect('/pelamar');

	}




	public function cetak_pdf($id)
	{

		$pelaamar = DB::table('pelamar2')
		->join('gambar','gambar.pelamar_id','=','pelamar2.id')
		->where('pelamar2.id',$id)->get();

		$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('pelamar_pdf',['pel'=> $pelaamar])->setPaper('legal');
		
		 //$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true], set_time_limit(300))->loadview('calculator.staff-print',['human'=> $human, 'now' => $now,  'calc' => $calc])->setPaper('legal');  

		return $pdf->download('data_pelamar.pdf');

	}
}