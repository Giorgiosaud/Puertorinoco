@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{!!$error!!}</li>
		@endforeach
		<li>{!!$errors->count()!!}</li>
	</ul>
@endif