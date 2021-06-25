@if(count($errors)>0)
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<ul>
				@foreach ($errors->all() as $error)
				<li class="fa fa-exclamation-circle">
					{{$error}}
				</li><br>
				@endforeach
			</ul>
		
	</div>
@endif

@if(session('message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<li class="fa fa-ceklist">
		{{session('message')}}
	</div>
@endif

@if(session('alert'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<li class="fa fa-ceklist">
		{{session('alert')}}
	</div>
@endif