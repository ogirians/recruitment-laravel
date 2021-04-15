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


 <div class="card shadow mb-4" style="margin-bottom: 0.0rem !important;">
 		<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-secondary">History Pelamar {{ $ktp }}</h6>
        </a>
 <div class="collapse show" id="collapseCardExample">
    <div class="card-body">
        <div class="container" style="padding-left:0px; ">
			<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<!--{{ $no = 1 }}-->
				<thead>
                    <tr>
                        <th>NO</th>
                    	  <th>Tanggal melamar</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Posisi</th>
                        <th>Umur</th>
                        <th>pendidikan</th>
                        <th>jurusan</th>

                        <!--<th>Nomor Telepon/HP</th>-->
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>NO</th>
                    	  <th>Tanggal melamar</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Posisi</th>
                        <th>Umur</th>
                        <th>pendidikan</th>
                        <th>jurusan</th>

                        <!--<th>Nomor Telepon/HP</th>-->
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
				  <tbody>
                    @foreach($history as $p)
                    <tr>
                        <td>{{ $no }}</td>
                    	  <td>{{ Carbon\Carbon::parse($p->created_at)->format('m-d-Y') }}</td>
                        <td>{{ $p->nama }}</td>
                        <td><img width="75px" src="{{ url('data_file/'.$p->file) }}"></td>
                        <td>{{ $p->posisi }}</td>
                        <td>{{ $p->umur }}</td>
                        <td>{{ $p->pendidikan }}</td>
                        <td>{{ $p->jurusan }}</td>
                        <!--<td>{{ $p->telepon }}</td>-->
                        <td>{{ $p->keterangan }}</td>
                        <td style="text-align: center;">
							           <div class="dropdown mb-4">
			                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                      Action
			                    </button>
			                       <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
			                        <a href="/pelamar/detail/{{ $p->pelamar_id  }}" class="dropdown-item">View</a>
			                        <a onclick="return confirm('terima pelamar sebagai karyawan baru ?')" href="/pelamar/in/{{ $p->pelamar_id }}" class="dropdown-item">qualified</a>
                              <a onclick="return confirm('pelamar tidak memenuhi kriteria ?')" href="/pelamar/notin/{{ $p->pelamar_id }}" class="dropdown-item">not qualified</a>


                              @if ($p->keterangan !== "seen")
                              <a onclick="return confirm('Yakin ingin menghapus data pelamar ?')" href="/pelamar/hapuspel/{{ $p->pelamar_id }}" class="dropdown-item">Hapus</a>
									            @else
                              <a onclick="return confirm('hapus dari list seen? Status akan kembali menjadi unproses!')" href="/pelamar/hapuspeljoin/{{ $p->pelamar_id }}" class="dropdown-item">unseen</a>
                              @endif
                              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#terserah_{{ $p->pelamar_id}}">Invite</a>

              			          </div>
			                        </div>
                                        <div class="modal fade" id="terserah_{{ $p->pelamar_id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <div class="modal-content">
                                                 <div class="modal-header">
                                                  <h5>Send Invitation Email</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 class="modal-title"></h4>
                                                </div>
                                            <div class="modal-body">

                                              <form action="/invite" method="post">
                                                {{ csrf_field() }}
                                                 <input class="form-control" id="exampleFormControlInput1" placeholder="Lowongan" type="hidden" name="id" required="required" value="{{ $p->pelamar_id }}">  <br/>
                                                <label for="exampleFormControlInput1">nama</label>
                                                <input class="form-control" id="exampleFormControlInput1" placeholder="Lowongan" type="text" name="nama" required="required" value="{{ $p->nama }}">  <br/>
                                                <label for="exampleFormControlInput1">email</label>
                                                <input class="form-control" id="exampleFormControlInput1" placeholder="Open" type="text" name="email" required="required" value="{{ $p->email }}">  <br/>
                                                <label for="exampleFormControlInput1">tanggal</label>
                                                <input class="form-control" id="exampleFormControlInput1" placeholder="tanggal" type="date" name="waktu" required="required" value="{{ old('tanggal') }}"><br/>
                                                <label for="exampleFormControlInput1">waktu</label>
                                                <input class="form-control" id="exampleFormControlInput1" placeholder="jam" type="text" name="jam" required="required" value="{{ old('jam') }}"><br/>
                                                <label for="exampleFormControlInput1">tempat</label>
                                                <input class="form-control" id="exampleFormControlInput1" placeholder="wilayah" type="text" name="tempat" required="required" value="{{ old('tempat') }}"><br/>
                                                <button class="btn btn-success" type="submit" >Kirim</button>

                                            <!--
                                                Posisi <input type="text" name="lowongan" required="required"> <br/>
                                                Status <input type="text" name="status" required="required"> <br/>
                                                Lokasi <input type="text" name="lokasi" required="required"> <br/>
                                                <input type="submit" value="Simpan Data">
                                            -->
                                              </form>

                                              </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-primary m-t-10" data-dismiss="modal"> Tutup</button>
                                            </div>
                                            </div>
                                            </div>
                                            </div>

						        </td>
                    </tr>
                     @php
                      $no = $no+1;
                     @endphp
                    @endforeach
                    </tbody>

				</table>
 		</div>
 	</div>
 </div>

@endsection