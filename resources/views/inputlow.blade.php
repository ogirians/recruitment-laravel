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

  


          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Daftar Lowongan</h1>
     

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                <a href="/tambah" class="btn btn-success">
                <span class="text">Tambahkan</span>
                </a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th>lokasi</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th>lokasi</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($lowongan as $p)
                    <tr>
                      <td>{{ $p->lowongan }}</td>
                      <td>{{ $p->status }}</td>
                      <td>{{ $p->lokasi }}</td>
                      <td style="text-align: center;">

                        <div class="dropdown mb-4">
                              <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                              </button>
                                  <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">  
                                         <a href ="/editlow/{{ $p->lowongan_id }}" class="dropdown-item" >Edit</a>
                                         <a onclick="return confirm('Yakin ingin menghapus data lowongan ?')" href="/hapus/{{ $p->lowongan_id }}" class="dropdown-item">Hapus</a></td>
                                  </div>
                       </div>
                       
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>


        



@endsection
    