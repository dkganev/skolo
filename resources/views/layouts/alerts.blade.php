@if(Session::has('alert-info'))
	<div class="alert alert-info" role="alert">
		<strong class="text-center alert-msg" >  {{ Session::get('alert-info')}}</strong>
	</div>
@endif

@if(Session::has('alert-success'))
	<div class="alert alert-success" role="alert">
		<strong class="text-center alert-msg">  {{ Session::get('alert-success') }}</strong>
	</div>
@endif

@if(Session::has('alert-danger'))
	<div class="alert alert-danger" role="alert">
		<strong class="text-center alert-msg">  {{ Session::get('alert-danger') }}</strong>
	</div>
@endif