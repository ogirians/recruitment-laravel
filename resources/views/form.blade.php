@extends('tema-logo')

@section('form')
  <link href="kuning/css/jquery.steps.css" rel="stylesheet">

  
  <div class= "containe-isi">
  <h4 style="padding-bottom: 7px; padding-top: 7px; text-align: left; " >Isi Formulir</h4>
  </div>

  

         

  <form id="captcha-form" action="/formulir/storepel" method="post" enctype="multipart/form-data">
  <div class="containe-isi">
  <div class="container" style="padding-bottom: 10px; padding-top: 20px;">

  <div id="wizard">

  <h4>Data Pribadi</h4>
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
  
    <section>
   
    <div class="row">
      <div class="col">
        <img src="kuning/img/biodata.png">
     </div>

     <div class="col">
        {{ csrf_field() }} 

        <label for="exampleFormControlInput1">Nama</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="nama" type="text" name="nama" required="required" value="{{ old('nama') }}">  <br/>

        <label for="exampleFormControlInput1">Email</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="ibi@gmail.com" type="email" name="email" required="required" value="{{ old('email') }}"> <br/>



          <div class="form-group">
          <label for="exampleFormControlSelect1">Posisi yang dilamar  </label>
          <select class="form-control" id="exampleFormControlSelect1" name="posisi" required="required" value="{{ old('posisi') }}">
          @foreach($lowongan as $p)
          <option>
          {{ $p->lowongan }}
          </option>
          @endforeach
          </select> 
          <br/>
       

         
        <label for="exampleFormControlInput1">Umur</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="25" type="text" name="umur" required="required" value="{{ old('umur') }}"> <br/>
        

        <label for="exampleFormControlInput1">Alamat</label>
       <input class="form-control" id="exampleFormControlInput1" placeholder="Alamat" type="text" name="alamat" required="required" value="{{ old('alamat') }}"> <br/>
        

         
        <label for="exampleFormControlInput1">Tempat Lahir</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="surabaya" type="text" name="tempat" required="required" value="{{ old('tempat') }}"> <br/>
      
      


        <label for="exampleFormControlInput1">Tanggal Lahir</label>
       <input class="form-control" id="datepicker" placeholder="tanggal" type="date" name="tanggal" required="required" value="{{ old('tanggal') }}"> <br/>
        
       
        <label for="exampleFormControlInput1">Agama</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="islam" type="text" name="agama" required="required" value="{{ old('agama') }}"><br/>
      

       
        <label for="exampleFormControlInput1">Kewarganegaraan</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="Indonesia" type="text" name="kewarganegaraan" required="required" value="{{ old('kewarganegaraan') }}"><br/>
    

   
          <label for="exampleFormControlSelect1">Status-Perkawinan</label>
          <select class="form-control" id="exampleFormControlSelect1" name="status" required="required" value="{{ old('status') }}">
          <option>Lajang</option>
          <option>Menikah</option>
          <option>Cerai</option>
          </select><br/>
       

        <label for="exampleFormControlInput1">No KTP</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="857352609261998" type="text" name="ktp" required="required" value="{{ old('ktp') }}"><br/>
      

        <label for="exampleFormControlInput1">No Telepon</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="0812278965412" type="text" name="telepon" required="required" value="{{ old('telepon') }}"><br/>
      
     
        <label for="exampleFormControlInput1">Pekerjaan Saat ini</label>
        <input class="form-control" id="exampleFormControlInput1" placeholder="Jobseeker"
        type="text" name="pekerjaan" required="required" value="{{ old('pekerjaan') }}">
        </div><br/>

   
    </div>
   

 
    </div>
   
 
   </section>

      <h4>Upload Data</h4>
   <section>
    <div class="row">
      <div class="col">
        <img src="kuning/img/biodata.png">
     </div>

    <div class="col">
      <div class="container">   
    

          <div class="form-group" style="border-bottom-width: 1px; border-bottom-style:solid; padding-bottom: 20px">
          {{ csrf_field() }}
            <h6 align="left">Pas Foto (4x6)</h6>
            <p align="left">file maksimal 200KB, format yang diperbolehkan hanya JPG, PNG, JPEG</p>
            <input type="file" name="file" required="required|file|image|mimes:jpeg,png,jpg|max:2048">
            </div>
            <br>

            <!--<div class="form-group">
            <b>Keterangan</b>
            <textarea class="form-control" name="keterangan"></textarea>
          </div>
            -->
    
        <div class="form-group" style="border-bottom-width: 1px; border-bottom-style:solid; padding-bottom: 20px;">
          {{ csrf_field() }}
            <h6 align="left">CV</h6>
            <p align="left">file maksimal 200KB, format yang diperbolehkan hanya PDF</p>
            <input type="file" name="cv" required="required|file|image|mimes:PDF|max:2048">
        </div>
        <br>
    

   
        <div class="form-group " style="border-bottom-width: 1px; border-bottom-style:solid;" >
          {{ csrf_field() }}
            <h6 align="left">Sertifikat pendukung</h6>
            <p align="left">file maksimal 200KB, jadikan satu file pdf, format yang diperbolehkan hanya PDF</p>
            <p align="left">Kosongkan bila tidak ada</p>
            <input type="file" name="sertif" required="required|file|image|mimes:PDF|max:2048">
          <br>
      
      </div>
      </div>
      </div>
    </div>


    </section>

 
    <h4>Finish</h4>
    <section>
    <div class="row">

      <div class="col">
        <img src="/kuning/img/biodata2.png">
     </div>

     <div class="col">
        <div class="form-group">
    
    </form>

          </div>
         </div>
    </div>

    </div>
    </section>





  </form>
  </div>
 </div>
  

  <script src="https://code.jquery.com/jquery-1.11.0.min.js">  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
  <script> 
  $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        onFinished: function (event, currentIndex) {
        $("form").submit();
        }
      
    
    });
  </script>


  
</div>
</div>
 
</div>
           
  


    <div class="overlay"></div>
    <br>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

@stop