<form novalidate role="form" enctype="multipart/form-data" id="formLocation">
	@include ('errors._list')
	@include ('partials.locations._store')

	<div class="form-group">
		<input type="text" name="location" class="form-control" placeholder="Cagayan de Oro City" ng-model="inputs.location">
	</div>

	<div class="form-group">
		<input type="text" name="title" class="form-control" placeholder="City of Golden Friendship" ng-model="inputs.title">
	</div>

	<div class="form-group">
		<textarea name="description" class="form-control" rows="10" ng-model="inputs.description"></textarea>
	</div>

	<div class="form-group">
		<input type="file" ng-model="inputs.avatar"/>
		<b class="pull-right">Image Of Place</b><br>
	</div>

	<div class="form-group">
		<img ng-src="@{{ inputs.avatar }}" alt="Image Of Place">
	</div>

	<div class="form-group clearfix">
		<button type="submit" class="btn btn-primary" ng-show="isCreate" ng-click="addLocation(inputs)">Add Location</button>
		<button type="submit" class="btn btn-warning" ng-hide="isEdit" ng-click="updateLocation(inputs)">Update Location</button>
		<button type="button" class="btn btn-default" ng-hide="isEdit" ng-click="cancel()">Cancel</button>
	</div>
</form>