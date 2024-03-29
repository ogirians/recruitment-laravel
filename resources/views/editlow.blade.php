@extends('master')

@section('edit')
 @foreach($lowongan as $p)

            <div class="col-xl-3 col-md-8 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
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
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
  
  <form action="/lowongan/update" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $p->lowongan_id }}"> <br/>
    <label for="exampleFormControlInput1">Posisi</label>
    <input class="form-control" id="exampleFormControlInput1" placeholder="Lowongan" type="text" name="lowongan" required="required" value="{{ $p->lowongan }}">  <br/>
    <label for="exampleFormControlSelect1">Status</label>
          <select class="form-control" id="exampleFormControlSelect1" name="status" required="required" value="{{ $p->status }}">
          <option selected="true" disabled="disabled">{{ $p->status }}</option>
          <option>Open</option>
          <option>Closed</option>
      </select><br/>
    <label for="exampleFormControlInput1">Lokasi</label>
    <input class="form-control" id="exampleFormControlInput1" placeholder="wilayah" type="text" name="lokasi" required="required" value="{{ $p->lokasi }}">  <br/>

     <div class="form-group" style="border-bottom-width: 1px; border-bottom-style:solid; padding-bottom: 20px">
            <h6 align="left">Requirement</h6>
            <p align="left">file maksimal 200KB, format yang diperbolehkan hanya JPG, PNG, JPEG</p>
            <input type="file" name="file_low">
    </div>

    <button class="btn btn-success" type="submit" >Simpan</button>
    <a href="/inputlow" class="btn btn-info btn">Kembali</a>

  </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>

            
        <!-- /.container-fluid -->

      </div>








 @endforeach  



@endsection         
        