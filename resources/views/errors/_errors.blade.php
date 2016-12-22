<style>ul.alert-danger { padding-left: 3em; }</style>

@if (count($errors))
	<ul class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif