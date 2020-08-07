<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">

th {
	text-align: center;
}

td {
	padding-right: 10px;
	padding-left: 10px;
	text-align: left;
}

.kop td {
	padding-left: 50px;
	padding-right: 50px;
}

.kop p{
	font-size: 12px;
	text-align: right;
}

.kop h5,h6 {
	text-align: center;
}

.kop img {
	text-align: left;
}

.kop table {
	padding-bottom: 15px;
}

#logo {
	padding-left: 10px;
	padding-right: 80px;
}

.foto img {
	padding-top: 6px;
}

.foto h2 {

}

#kanan {
	padding-left: 80px;
	padding-right: 10px;
	padding-bottom: 40px;
}

.RIWAYAT th {
	text-align: center;
}

.RIWAYAT td {
	padding-right: 10px;
	padding-left: 10px;
	text-align: left;
}

h5 {
	text-align: center;
}

.KEMAMPUAN p {
	text-align: left;
}

#asing {
	text-align: left;
}

.container {
	padding-right: 35px;
	padding-left: 40px;
	padding-bottom: 20px;
}



.ttd p {
	text-align: right;
}
</style>
</head>

<body>
<?php
$home = $_SERVER["DOCUMENT_ROOT"];

?>
	<div class="kop">
	<table align="center">
	<tr>
	<td id="logo">
	<img width="100px" height="85px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/kuning/img/logo_ibi.png';?>"/>
	</td>

	<td>
	<h5  align="center">PT INDOBERKA INVESTAMA</h5>
	<h6><U>FORM LAMARAN KERJA</U></h6>	
	</td>

	<td id="kanan">
	<p>IBI-HRD-FR-003</p>
	</td>

	</tr>

	</table>
	</div>


@foreach($pel as $p)


<div class="container" align="center">

<div class="row">
<div class="foto" align="center">
<img width="160px" height="240px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/data_file/'. $p->file;  ?>">

</div>
<h2>Posisi : {{ $p-> posisi }}</h2>

<h5><U><b>DATA PRIBADI</b></U></h5>





<div class="col">
<div class="data-pribadi">

<br>


<table>


<tr>
	<td>
		Nama
	</td>
	<td>
		: {{ $p->nama }}
	</td>
</tr>
<tr>
	<td>
		posisi
	</td>
	<td>
		: {{ $p->alamat}}
	</td>

</tr>
<tr>
	<td>
		Tempat, Tanggal lahir
	</td>
	<td>
		: {{ $p->tempat }},{{ Carbon\Carbon::parse($p->tanggal)->format('d-M-Y') }}
	</td>
</tr>

<tr>
	<td>
		Agama
	</td>
	<td>
		: {{ $p->agama }}
	</td>
</tr>

<tr>
	<td>
		Kewarganegaraan
	</td>
	<td>
		: {{ $p->kewarganegaraan }}
	</td>
</tr>
<tr>
	<td>
		Status perkawinan
	</td>
	<td>
		: {{ $p->status }}
	</td>
</tr>
<tr>
	<td>
		Nomer Ktp
	</td>
	<td>
		: {{ $p->ktp }}
	</td>
</tr>
<tr>
	<td>
		Nomer telepon/hp
	</td>
	<td>
		: {{ $p->telepon }}
	</td>
</tr>
<tr>
	<td>
		Pekerjaan saat ini
	</td>
	<td>
		: {{ $p->pekerjaan }}
	</td>
</tr>

@endforeach
</table>

</div>


</div>
</div>
</div>



<div class="container" style="page-break-before: always;">
<div class="RIWAYAT">
<div class="table-responsive" style="padding-bottom: 10px;">
<h5><U><b>RIWAYAT PENDIDIKAN</b></U></h5>
<br>
<table class="table">
	<tr>
		<th></th>
		<th>Nama Sekolah</th>
		<th>Tempat</th>
		<th>Jurusan</th>
		<th>Lulus Tahun</th>
	</tr>
	<tr>
		<td>SD</td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
	<tr>
		<td>SMP</td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
	<tr>
		<td>SMA/SMK</td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>

	<tr>
		<td>Kuliah</td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
</table>
</div>
</div>
</div>

<div class="container" align="left">
<div class="RIWAYAT">
<div class="table-responsive">
<h5><U><b>PELATIHAN</b></U></h5>
<br>
<table class="table">
	<tr>
		<th></th>
		<th>Nama Kursus</th>
		<th>Penyelenggara</th>
		<th>Lama Kursus</th>
	</tr>
	<tr>
		<td>1</td>
		<td> ____________________ </td>
		<td> ____________________ </td>
		<td> ____________________ </td>
	
	</tr>
	<tr>
		<td>2</td>
		<td> ____________________ </td>
		<td> ____________________ </td>
		<td> ____________________ </td>
	
	</tr>

	<tr>
		<td>3</td>
		<td> ____________________ </td>
		<td> ____________________ </td>
		<td> ____________________ </td>
	
	</tr>
</table>
</div>
</div>

</div>



<div class="container" align="left">
<div class="RIWAYAT">
<div class="table-responsive" style="padding-bottom: 10px;">
<h5><U><b>RIWAYAT PEKERJAAN</b></U></h5>
<br>
<table class="table">
	<tr>
		<th></th>
		<th>Nama Perusahaan</th>
		<th>Tempat</th>
		<th>Jabatan</th>
		<th>Lama kerja</th>
	</tr>
	<tr>
		<td>1</td>
		<td> _______________ </td>
		<td> _______________ </td>
		<td> _______________ </td>
		<td> _______________ </td>
	</tr>
	<tr>
		<td>2</td>
		<td> _______________ </td>
		<td> _______________ </td>
		<td> _______________ </td>
		<td> _______________ </td>
	</tr>

	<tr>
		<td>3</td>
		<td> _______________ </td>
		<td> _______________ </td>
		<td> _______________ </td>
		<td> _______________ </td>
	</tr>
</table>
</div>
</div>
</div>


<div class="container" align="left">
<div class="RIWAYAT">
<div class="table-responsive" style="padding-bottom: 10px;">
<h5><U><b>DATA KELUARGA</b></U></h5>
<br>
<table class="table">
	<tr>
		<th></th>
		<th>Nama</th>
		<th>Umur</th>
		<th>Pendidikan</th>
		<th>Pekerjaan</th>
	</tr>
	<tr>
		<td>Ayah</td>
		<td> __________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
	<tr>
		<td>Ibu</td>
		<td>  __________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>

	<tr>
		<td>Saudara</td>
		<td>1._________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
	<tr>
		<td></td>
		<td>2._________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
	<tr>
		<td></td>
		<td>3._________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>

	<tr>
		<td>Suami/istri/anak</th>
		<td>1._________________</th>
		<td> _____ </th>
		<td> _____________ </th>
		<th> _____________ </th>
	</tr>

	<tr>
		<td></td>
		<td>2._________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
	<tr>
		<td></td>
		<td>3._________________</td>
		<td> _____ </td>
		<td> _____________ </td>
		<td> _____________ </td>
	</tr>
</table>
</div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>

<div class="container" style="page-break-before: always;">
<div class="KEMAMPUAN">
<div class="table-responsive" style="padding-bottom: 20px;">
<h5><U><b>KEMAMPUAN BAHASA DAN PRESTASI</b></U></h5>
<br>
<table align="left">
<tr>
	<td id="asing">
		Bahasa Asing yang dikuasai
	</td>
	<td>
		: ____________________________
	</td>
</tr>
<tr>
	<td id="asing">
		Bahasa Daerah yang dikuasai
	</td>
	<td>
		: ____________________________
	</td>
</tr>
</table>
</div>
<br>
<br>
<p>Prestasi atau karya ilmiah yang pernah anda raih (seperti membangun proyek baru, merintis usaha, dsb) :</p>
<p>a.____________________________Tahun_______</p>
<p>b.____________________________Tahun_______</p>
</div>
</div>


<div class="container" align="left">
<div class="INFORMASI">
<div class="table-responsive" style="padding-bottom: 20px;">
<h5><U><b>INFORMASI</b></U></h5>
<br>
<P>Alasan meninggalkan pekerjaan terakhir anda: </P>
<p>__________________________________________________</p>
<P>Hobby anda : </P>
<p>__________________________________________________</p>
<P>Anda membaca surat kabar: Majalah / Koran / Berita Online / Lain-Lain__________ </P>
<p>Username Sosial Media Instagram: _______________ Facebook: _______________ </p>
<P>Usaha sampingan apa yang saudara lakukan untuk menambah penghasilan?</P>
<p>__________________________________________________</p>
<P>Pernah mengikuti organisasi apa saja? </P>
<p>__________________________________________________</p>
<P>Darimana anda memperoleh informasi mengenai lowongan pekerjaan di perusahaan kami?</P>
<p>__________________________________________________</p>
<P>Adakah yang anda kenal atau relasi anda di perusahaan ini? </P>
<p>__________________________________________________</p>
<P>Pekerjaan yang anda kuasai dan bagian yang saudara inginkan: </P>
<p>__________________________________________________</p>
<P>Gaji minimum yang diinginkan beserta tunjangan yang diharapkan: </P>
<p>__________________________________________________</p>
<p>Apakah anda bersedia menjalani masa percobaan 3 (tiga) bulan? Bersedia / Tidak Bersedia </p>
<P>Apakah anda bersedia bertugas ke luar kota? Bersedia / Tidak Bersedia </P>
<p>Apakah anda bersedia dipindahkan ke kota lain? Bersedia / Tidak Bersedia</p>






</div>
</div>
</div>



<div class="container" align="left">
<div class="KEMAMPUAN" style="padding-bottom: 20px;">

<h5><U><b>LAIN-LAIN</b></U></h5>
<br>
<p>Apakah saudara pernah sakit keras? Pernah / Tidak </p>
<p>Apakah anda memiliki penyakit khusus? Ada / Tidak </p>
<p>Apakah anda pernah mengalami kecelakaan berat? Iya / Tidak </p>
<p>Apa golongan darah saudara? O / A / B / AB </p>
<p>Tuliskan kontak (nama dan nomor telp) orang terdekat anda yang dapat dihubungi </p>
<p>__________________________________________________</p>
<br>

<p>“Saya menyatakan keterangan diatas dibuat dengan jujur dan benar, apabila ternyata terdapat keterangan yang tidak sesuai saya bersedia menerima segala konsekuensi yang diberikan oleh PT Indoberka Investama dengan ketentuan yang berlaku.” </p>

<br>

<div class="ttd" align="right">
<p>Surabaya, __________________________ </p>
<br>
<br>
<br>
<pre>(                      )</pre>
</div>


</div>
</div>




</body>
</html>