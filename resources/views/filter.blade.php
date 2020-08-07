@extends('master')

@section('edit')
      <!-- Content Row (INI YANG DIRUBAH) -->
   <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>
 
        
<h1 class="h3 mb-2 text-gray-800">Daftar Pelamar</h1>
     

          	<div class="card shadow mb-4" style="margin-bottom: 0.0rem !important;">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-secondary">Filter</h6>
                </a>

                <!-- Card Content - Collapse -->
                 {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                        	<div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            @endif
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                        <div class="container" style="padding-left:0px; ">
           				<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/pelamar/filter" method="POST" style="max-height: 150px;">
           				
           				<div class="row">
                        <div class="col">
                        {{ csrf_field() }}
                        <a style="padding-bottom: 10px;">Tanggal Mulai: </a> 
                        <div class="input-group">
                       <input type="date" class="form-control bg-light border-0 small" placeholder="tanggal"   aria-label="Search" aria-describedby="basic-addon2" name="start_date">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>
                        
                     	<div class="col">
                        <a style="padding-bottom: 10px;">Tanggal Selesai: </a> 
                        <div class="input-group">
                       <input type="date" class="form-control bg-light border-0 small" placeholder="tanggal"   aria-label="Search" aria-describedby="basic-addon2" name="finish_date">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>

                     	<div class="col">
                        <a style="padding-bottom: 10px;">Posisi: </a> 
                        <div class="input-group">
                       <input type="text" class="form-control bg-light border-0 small" placeholder="posisi"   aria-label="Search" aria-describedby="basic-addon2" name="pos">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>

                     	<div class="col">
                        <a style="padding-bottom: 10px;">Usia minimal: </a> 
                        <div class="input-group">
                       <input type="number" class="form-control bg-light border-0 small" placeholder="usia"   aria-label="Search" aria-describedby="basic-addon2" name="old-min">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>

                     	<div class="col">
                        <a style="padding-bottom: 10px;">Usia maksimal: </a> 
                        <div class="input-group">
                       <input type="number" class="form-control bg-light border-0 small" placeholder="usia"   aria-label="Search" aria-describedby="basic-addon2" name="old-max">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>

                     	<div class="col" >
                         <div class="input-group-append" style="margin-left: 80px; margin-top: 30px;">
                         <button class="btn btn-sm btn-success" type="submit" >
                         <i class="fas fa-arrow-right">  GO</i>
                         </button>
                         </div>
                     	</div>

                       </div>
                		</form>
            		</div>
                  </div>
                </div>
              </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!--<h6 class="m-0 font-weight-bold text-primary">
                <a href="/pelamar" class="btn btn-success">
                <span class="text">Tambahkan</span>
                </a></h6>-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>Tanggal melamar</th>
                        <th>Nama</th>
                        <th>Foto</th>
						<th>Posisi</th>
						<th>Umur</th>
						<th>Nomor Telepon/HP</th>
						<th>Status</th>
						<th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    	<th>Tanggal melamar</th>
                        <th>Nama</th>
                        <th>Foto</th>
						<th>Posisi</th>
						<th>Umur</th>
						<th>Nomor Telepon/HP</th>
						<th>Status</th>
						<th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($pel as $p)
                    <tr> 

                    	<td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                        <td>{{ $p->nama }}</td>
                        <td><img width="75px" src="{{ url('data_file/'.$p->file) }}"></td>
						<td>{{ $p->posisi }}</td>
						<td>{{ $p->umur }}</td>
						<td>{{ $p->telepon }}</td>
						<td>{{ $p->keterangan }}</td>
						<td style="text-align: center;">
							<div class="dropdown mb-4">
			                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                      Action
			                    </button>
			                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
			                        <a href="/pelamar/detail/{{ $p->pelamar.id  }}" class="dropdown-item">View</a>
		                            <a onclick="return confirm('Yakin ingin menghapus data pelamar ?')" href="/pelamar/hapuspel/{{ $p->id }}" class="dropdown-item">Hapus</a>
									<a href="/pelamar/detail/{{ $p->id  }}" class="dropdown-item">Invite</a>
			                    </div>
			                 </div>
							
						</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>





<!--

	<h3>Data Pelamar</h3>

	<a href="/pelamar/tambahpel"> + Tambah Pelamar</a>
	
	<br/>
	<br/>

	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Posisi yang diinginkan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Agama</th>
			<th>Kewarganegaraan</th>
			<th>Status Perkawinan</th>
			<th>Nomor KTP</th>
			<th>Nomor Telepon/HP</th>
			<th>Pekerjaan saat ini</th>
			<th>Opsi</th>
		</tr>
		@foreach($pel as $p)
		<tr>
			<td>{{ $p->nama }}</td>
			<td>{{ $p->posisi }}</td>
			<td>{{ $p->umur }}</td>
			<td>{{ $p->alamat }}</td>
			<td>{{ $p->tempat }}</td>
			<td>{{ $p->tanggal }}</td>
			<td>{{ $p->agama }}</td>
			<td>{{ $p->kewarganegaraan }}</td>
			<td>{{ $p->status }}</td>
			<td>{{ $p->ktp }}</td>
			<td>{{ $p->telepon }}</td>
			<td>{{ $p->pekerjaan }}</td>
			<td>
				<a href="/pelamar/editpel/{{ $p->id  }}">edit</a>
				|
				<a href="/pelamar/hapuspel/{{ $p->id }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
-->
  <!-- Page level plugins -->
  <script src="/kuning/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/kuning/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/kuning/js/demo/datatables-demo.js"></script>



@endsection
 