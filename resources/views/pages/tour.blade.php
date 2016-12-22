@extends('layouts.admin')

@section ('content')
	<div class="Location" ng-controller="TourController">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<h2 class="text-center">New Tour</h2><hr>
			@include ('partials.tours._form')
		</div>

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<h2 class="text-center">Records</h2><hr>
			@include ('partials.tours._table')
		</div>
	</div>
@endsection

@section ('footer')
	<script src="{{ asset('js/controllers/TourController.js') }}"></script>
@endsection

