<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
//use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

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
			->orderBy('pelamar2.updated_at','desc')
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

    public function getDownloadCv($cv,$nama)

	{

    $file=public_path()."/data_cv/".$cv ;



	$headers = [
              'Content-Type' => 'application/pdf',
           ];
	return response()->download($file, 'CV_'.$nama.'.pdf', $headers);

}

   public function getDownloadSert($sert,$nama)

	{

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
			->orWhere('pelamar2.keterangan','=', 'pushed')
			->get();

		//return view('join', compact('data'));
		return view('qualified', ['data' => $data]);
	}

		public function unqualified()
	{
		$data = DB::table('pelamar2')

			->join('gambar', 'pelamar_id', '=', 'pelamar2.id')
			->where('pelamar2.keterangan', '=', 'not qualified')
			->get();

		//return view('join', compact('data'));
		return view('unqualified', ['data' => $data]);
	}

	public function push($id)
	{
		$getidfoto = DB::table('gambar')->select('file')->where('pelamar_id',$id)->first();
		$fotoname = $getidfoto->file;

		$file = '../public/data_file/'.$fotoname;
		$imagedata = file_get_contents($file);
		$base64 = base64_encode($imagedata);

		$pelamar = DB::table('pelamar2')->where('id',$id)->first();
		$now = Carbon::now()->format('Y-m-d');

		$client = new \GuzzleHttp\Client();
		$url = "https://office.indoberkainvestama.com/api/store";

		$response = $client->request('POST',$url, [
			/*'form_params' => [
				'name'            	=> $pelamar->nama,
				'birth'       		=> $pelamar->tanggal,
				'phone'            	=> $pelamar->telepon,
				'idnum'           	=> $pelamar->ktp,
				'status'			=> $pelamar->status,
				'address1'			=> $pelamar->alamat,
				'agama'				=> $pelamar->agama,
				'start_day'			=> $now,
				//'photo'				=> $base64,
			],*/
			'multipart' => [
				[
					'name'     => 'name',
					'contents' =>  $pelamar->nama,
				],
				[
					'name'     => 'birth',
					'contents' => $pelamar->tanggal,
				],
				[
					'name'     => 'phone',
					'contents' => $pelamar->telepon,

				],
				[
					'name'     => 'idnum',
					'contents' => $pelamar->ktp,

				],
				[
					'name'     => 'status',
					'contents' => $pelamar->status
				],
				[
					'name'     => 'address1',
					'contents' => $pelamar->alamat,

				],
				[
					'name'     => 'agama',
					'contents' => $pelamar->agama,

				],
				[
					'name'     => 'start_day',
					'contents' => $now,
				],
				[
					'name'     => 'photo',
					'contents' => file_get_contents($file),
					'filename' => $fotoname,
				]
			]
		]);

		DB::table('pelamar2')->where('id',$id)->update([

			'keterangan' => 'pushed',

			]);

		$pesan = json_decode($response->getBody());
		//$message = $pesan->status;

		Session::flash('pushed_message', 'data telah di push');
		return back();
	}

}
?>