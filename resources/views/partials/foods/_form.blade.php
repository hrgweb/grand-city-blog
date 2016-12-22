<form novalidate role="form" enctype="multipart/form-data">
	@include ('errors._list')
	@include ('partials.locations._store')

	{{-- <pre>@{{ isError }}</pre> --}}

	<div class="form-group">
		<input type="text" name="name" class="form-control" placeholder="Fried Chicken" ng-model="inputs.name">
	</div>

	<div class="form-group">
		<textarea name="description" class="form-control" rows="10" ng-model="inputs.description"></textarea>
	</div>

	<div class="form-group">
		<input type="file" name="avatar" class="pull-left">
		<b class="pull-right">Image Of Place</b><br>
	</div>

	<div class="form-group">
		<img ng-src="@{{ inputs.avatar }}" alt="Image Of Place">
	</div>

	<div class="form-group" style="clear: both;">
		<button type="submit" class="btn btn-primary" ng-show="isCreate" ng-click="addFood(inputs)">Add Food</button>
		<button type="submit" class="btn btn-warning" ng-hide="isEdit" ng-click="updateFood(inputs)">Update Food</button>
		<button type="button" class="btn btn-default" ng-hide="isEdit" ng-click="cancel()">Cancel</button>
	</div>
</form>