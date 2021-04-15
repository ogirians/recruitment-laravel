@if(Session::has('deleted_message'))
	<div class="alert alert-danger alert-message fade" style="margin-top:10px;font-size:14px" style="opacity: 2.4;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{session('deleted_message')}}
	</div>
@endif

@if(Session::has('created_message'))
	<div class="alert alert-success alert-message fade" style="margin-top:10px;font-size:14px;" style="opacity: 2.4;">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{session('created_message')}}
	</div>
@endif

@if(Session::has('applied_message'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{session('applied_message')}}
	</div>
@endif

@if(Session::has('blocked_message'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{session('blocked_message')}}
	</div>
@endif

@if(Session::has('pushed_message'))
<div class="alert alert-success alert-message fade" style="margin-top:10px;font-size:14px;" style="opacity: 2.4;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{session('pushed_message')}}
	</div>
@endif

@if(Session::has('pushed_fail'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{session('pushed_fail')}}
	</div>
@endif
