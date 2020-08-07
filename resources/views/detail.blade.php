@extends('master')

@section('edit')


@foreach($pel as $p)
<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-secondary" style="text-transform: uppercase;">Data Pribadi : {{ $p->nama }}</h6>
                </div>
                <div class="card-body">
                  
<h5><U><b></b></U></h5>


<div class="row">
<div class="col" align="center" style="padding-bottom: 40px; padding-top: 30px;">
<img width="160px" height="240px" src="{{ url('data_file/'.$p->file) }}">
<h2>{{ $p-> posisi }}</h2>
</div>
<div class="col">
<div class="data-pribadi">

<br>

<div class="table-responsive">
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
<br>
<a href="/pelamar/download/cv/{{ $p->file_cv }}/{{ $p->nama }}" class="btn btn-secondary btn-sm">Download CV</a>
<?php
$a = $p->file_sertifikat;
if($a != null){
echo "<a href='/pelamar/download/sert/$p->file_sertifikat/$p->nama' class='btn btn-info btn-sm'>Download sertifikat</a>";
}
?>
<a href="/pelamar/cetak/{{ $p->pelamar_id }}" class="btn btn-sm btn-primary" target="_blank" style="margin-left-right: 10px; margin-left: 5px;">Download Form</a>
@endforeach

</div>
</div>
</div>

                


 </div>
 </div>


@endsection