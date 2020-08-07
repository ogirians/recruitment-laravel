<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/cleareverything', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('debugbar:clear');
    echo "Debug Bar cleared<br>";
});

/////////////////////////////////////////////////////start-frontwebsite//////////////////////////////////////////////////////

//halaman utama
Route::get('/', function () { 
    return view('isi');
	});

//untuk menampilkan list lowongan
Route::get('/','BlogController@isi');

//untuk menampilkan formulir
Route::get('/formulir', function () {
    return view('form');
	});

//untuk menampilkan opsi lowongan di formulir
Route::get('/formulir','BlogController@opsi');

//untuk simpan data pelamar
Route::post('/formulir/storepel','pelamar2Controller@storepel2');

//menampilkan detail pelamar
Route::get('/data/{iddata}','BlogController@lembaran');

//mencetak form pdf pelamar
Route::get('/data/cetak/{id}','BlogController@cetak_pdf');



//////////////////////////////////////////////////end-frontwebsite////////////////////////////////////////////////////////








/////////////////////////////////////////////////start-dashboard/////////////////////////////////////////////////////////

Auth::routes();

//main dashboard
Route::get('/lowongan','LowonganController@index');

//untuk mencari pelamar
Route::get('/join/cari','JoinController@lembaran2');


////////////////////////////////////start-list lowongan///////////////////

//tampilkan list lowongan
Route::get('/inputlow','LowonganController@inputlow');

//menambahkan lowongan baru
Route::get('/tambah','LowonganController@tambah');
Route::post('/lowongan/store','LowonganController@store');

//mengedit lowongan
Route::get('/editlow/{id}','LowonganController@editlow');
Route::post('/lowongan/update','LowonganController@update');	

//menghapus lowongan
Route::get('/hapus/{id}','LowonganController@hapus');

///////////////////////////a/////////end- list lowongan////////////////////



/////////////////////////////////start-list pelamar///////////////////////

//tampilkan list pelamar
Route::get('/pelamar','LowonganController@lembaran2');

//untuk kirim email ke pelamar
Route::post('/invite', 'LowonganController@updatepel2');

//hapus pelamar
Route::get('/pelamar/hapuspel/{id}','LowonganController@hapuspel');

//melihat detail pelamar
Route::get('/pelamar/detail/{id}','LowonganController@lembaran');



//untuk download CV pelamar
Route::get('/pelamar/download/cv/{cv}/{nama}','JoinController@getDownloadCv');
//untuk download sertifikat pelamar
Route::get('/pelamar/download/sert/{sert}/{nama}','JoinController@getDownloadSert');
//mencetak form pdf pelamar
Route::get('/pelamar/cetak/{id}','LowonganController@cetak_pdf');



//untuk memfilter pelamar
Route::get('/pelamar/filter', 'LowonganController@parah');
Route::get('/pelamar/filter/{start?}/{end?}/{pos?}/{old_min?}/{old_max?}','LowonganController@filter');

////////////////////////////////end- list pelamar////////////////////////




///////////////////////////////start-list on progres/////////////////////

//menampilkan list on proges
Route::get('/OnProgres', 'JoinController@index');

//untuk set not qualified pelamar
Route::get('/pelamar/notin/{id}', 'JoinController@notin');

//untuk set qualified pelamar
Route::get('/pelamar/in/{id}', 'JoinController@in');

//untuk hapus pelamar dari list on proges
Route::get('/pelamar/hapuspeljoin/{id}', 'JoinController@hapusjoin');


///////////////////////////////end- list on progres/////////////////////



//untuk menampilkan qualified pelamar
Route::get('/finish','JoinController@show');

/////////////////////////////////////////////////end-dashboard//////////////////////////////////////////////////////////











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
