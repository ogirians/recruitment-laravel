@extends('tema')

@section('list')
 
  <div class="container" style="padding-bottom: 10px; padding-top: 20px;">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Position</th>
        <th>Area</th>
        <th>Requirements</th>
      </tr>
    </thead>
    <tbody>
       @foreach($lowongan as $z)
    <tr>
      <td>{{ $z->lowongan }}</td>
      <td>{{ $z->lokasi }}</td>
      <td>  
            <button type="button" class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#myModal_{{ $z->lowongan_id }}">
             View
            </button>

                <div class="modal fade" id="myModal_{{ $z->lowongan_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                      </div>
                      <div class="modal-body">
                        <center>  
                          <img width="400px" height="500px" src="{{ url('data_low/'.$z->file_low) }}" alt="" class="img-responsive">
                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
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
      <a href="/formulir" class="btn btn-primary btn-md js-scroll-trigger" href="#about" style="margin-right:10px; margin-left:40px;">Apply Now</a>
      <a href="https://indoberkainvestama.com/" class="btn btn-primary btn-md js-scroll-trigger" href="#about" style="margin-left:10px;">About Ibi truss</a>

    <div class="overlay"></div>
    <br>

 
  <!-- Modal -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection

  <!-- Footer -->
 