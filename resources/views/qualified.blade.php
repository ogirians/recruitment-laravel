@extends('master')

@section('edit')



<h1 class="h3 mb-2 text-gray-800">Daftar pelamar yang diterima</h1>

@include('includes.message')


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
                        <th>Foto</th>
                        <th>Posisi</th>
                        <th>Nomor Telepon/HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Posisi</th>
                        <th>Nomor Telepon/HP</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($data as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td><img width="75px" src="{{ url('data_file/'.$p->file) }}"></td>
                        <td>{{ $p->posisi }}</td>
                        <td>{{ $p->telepon }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td>
                        <!--<a href="/pelamar/detail/{{ $p->id }}" class="btn btn-info btn-sm">View</a>-->
                        <div class="dropdown mb-4">
                          <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                <a href="/pelamar/detail/{{ $p->pelamar_id  }}" class="dropdown-item">View</a>
                                <a onclick="return confirm('terima pelamar sebagai karyawan baru ?')" href="/pelamar/in/{{ $p->pelamar_id }}" class="dropdown-item">qualified</a>
                                <a onclick="return confirm('pelamar tidak memenuhi kriteria ?')" href="/pelamar/notin/{{ $p->pelamar_id }}" class="dropdown-item">not qualified</a>
                                <a onclick="return confirm('hapus dari list on proses? Status akan kembali menjadi unproses!')" href="/pelamar/hapuspeljoin/{{ $p->pelamar_id }}" class="dropdown-item">delete</a>
                                <a onclick="return confirm('push karyawan baru ke daftar karyawan PT Indoberka?')" href="/pelamar/push/{{ $p->pelamar_id }}" class="dropdown-item">push data</a>
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




@endsection