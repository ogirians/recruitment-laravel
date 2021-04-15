@extends('tema-logo')

@section('form')
      <!-- Content Row (INI YANG DIRUBAH) -->

<div class= "containe-isi">
<div id="dvContainer">


<div class="row" style="margin-bottom: 70px;">
	<div class="col" align="left" style="padding-left: 50px;">
	<img width="100px" height="85px" src="/kuning/img/logo_ibi.png">
	</div>
	<div class="col">
	<h5  align="center" style="padding-top:20px;">PT INDOBERKA INVESTAMA</h5>
	<h6><U>FORM LAMARAN KERJA</U></h6>
	</div>
	<div class="col" align="right" style="padding-top: 20px; padding-right: 50px; ">
	<p>IBI-HRD-FR-003</p>
	</div>
</div>



<div class="container" align="center" style="padding-left: 50px; padding-bottom: 35px; padding-right: 50px;">
<h5><U><b>DATA PRIBADI</b></U></h5>
@foreach($pel as $p)

<div class="row">
<div class="col" align="center" style="padding-bottom: 40px; padding-top: 30px;">
<img width="160px" height="240px" src="{{ url('data_file/'.$p->file) }}">
<h2>{{ $p-> posisi }}</h2>
</div>
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
		Alamat
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
		Pendidikan
	</td>
	<td>
		: {{ $p->pendidikan }}
	</td>
</tr>

<tr>
	<td>
		jurusan
	</td>
	<td>
		: {{ $p->jurusan }}
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


</table>

</div>
</div>
</div>
</div>


</div>

<div class="container" style="padding-bottom: 20px;">
<div class="ket" style="text-align: left;">
<pre style="color: red;">
* Hanya kandidat terpilih yang akan diundang untuk interview.
* Undangan akan dikirim melalui Email yang diisi pada formulir pendaftaran. (cek juga bagian SPAM)
* Harap segera <b>UNDUH FORM</b> dan lengkapi data anda ketika akan menghadiri tahap interview.
* Form wajib dibawa ketika menghadiri interview.
</pre>
<br>
<br>
</div>
<a href="/data/cetak/{{ $p->pelamar_id }}" class="btn btn-primary" target="_blank">UNDUH FORM</a>
@endforeach
</div>

</div>






@stop
