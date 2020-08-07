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
 
        
<h1 class="h3 mb-2 text-gray-800">Hasil pencarian</h1>
     

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
                        <th>Nama</th>
						<th>Posisi</th>
						<th>Umur</th>
						<th>Nomor Telepon/HP</th>
						<th>Status</th>
						<th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Nama</th>
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
                        <td>{{ $p->nama }}</td>
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
                              <a href="/pelamar/detail/{{ $p->pelamar_id  }}" class="dropdown-item">View</a>
                                <a onclick="return confirm('Yakin ingin menghapus data pelamar ?')" href="/pelamar/hapuspel/{{ $p->pelamar_id }}" class="dropdown-item">Hapus</a>
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
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>




-->
  <!-- Page level plugins -->
  <script src="/kuning/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/kuning/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/kuning/js/demo/datatables-demo.js"></script>



@endsection
 