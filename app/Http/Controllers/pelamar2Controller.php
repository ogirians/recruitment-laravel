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
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\Session;
use DateTime;
use Carbon\Carbon;

class pelamar2Controller extends Controller
{
    //

 public function storepel2(Request $request)
    {

		$posisi = $request->only(['posisi']);
		$onktp = $request->only(['ktp']);
		$ktp = pelamar2::select('ktp')->where('ktp',$onktp)->where('posisi', $posisi)->first();
		$blockktp = pelamar2::select('ktp', 'updated_at')->where('ktp',$onktp)->where('keterangan', 'not qualified')->first();


		if ($blockktp !== null) {

			$now = Carbon::now()->format('D-m-Y');

			$end = $blockktp->updated_at;
			date_add($end,date_interval_create_from_date_string("1 years"));

			$datetime1 = new DateTime($now);
			$datetime2 = new DateTime($end);
			$interval = $datetime1->diff($datetime2);

			$waktu = $interval->format('%D hari, %m bulan, %Y tahun');

			Session::flash('applied_message', 'maaf anda dapat melamar lagi setelah '.$waktu);
			return redirect("/formulir");

		} elseif ($ktp !== null) {
			Session::flash('blocked_message', 'maaf anda sudah pernah melamar di posisi ini');
			return redirect("/formulir");

		} else {

			$messages = [

					'exists' => 'untuk sementara anda tidak dapat melamar'
				];

			//$request->session()->regenerateToken();
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
				'pendidikan' => 'required',
				'jurusan' => 'required',
				'status' => 'required',
				'ktp' => 'required|numeric|digits:16',
				'telepon' => 'required|numeric',
				'pekerjaan' => 'required',
				'file' => 'required|file|image|mimes:jpeg,png,jpg|max:200',
				'cv' => 'required|mimetypes:application/pdf|max:200',
				'sertif' => 'mimetypes:application/pdf|max:200',

			],$messages);

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
				'pendidikan' => $request->pendidikan,
				'jurusan' => $request->jurusan,
				'status' => $request->status,
				'ktp' => $request->ktp,
				'telepon' => $request->telepon,
				'pekerjaan' => $request->pekerjaan,
				'keterangan' => $belum,
			]);

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


				$id_pela = pelamar2::find($id_pel);

				cv2::create([
					'pelamar_id' => $id_pel,
					'file_cv' => $nama_cv,
				]);



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
				};

			$iddata = Crypt::encrypt($id_pel);

			$isidata = Crypt::decrypt($iddata);

			//proses_upload($foto);
			$data = $request->all();

			// alihkan halaman ke halaman pelamar

			return redirect("/data/$iddata");

		}
	}

}
