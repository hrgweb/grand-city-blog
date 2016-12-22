app.service('crud', ['$http', function($http){
	
	/**
	 * Location - CRUD
	 */

	this.getLocationRecords = function() {
		return $http.get('/location/getLocationRecords');
	};

	this.addLocation = function(inputs) {
		return $http({
			method: 'POST',
			url: '/location',
			data: inputs
		});
	};

	this.updateLocation = function(inputs) {
		return $http({
			url: '/location/' + inputs.id,
			method: 'PUT',
 			data: inputs
		});
	};

	this.deleteLocation = function(record) {
		var locationID = record.id;

		return $http.delete('/location/' + locationID, {
			data: { id: locationID }
		});
	};

	/**
	 * Food - CRUD
	 */
	this.getFoodRecords = function() {
		return $http.get('food/getFoodRecords');
	};

	this.addFood = function(data) {
		return $http({
			method: 'POST',
			url: '/food',
			data: data
		});
	};

	this.updateFood = function(inputs) {
		return $http({
			url: '/food/' + inputs.id,
			method: 'PUT',
 			data: inputs
		});
	};

	this.deleteFood = function(record) {
		var foodID = record.id;

		return $http.delete('/food/' + foodID, {
			data: { id: foodID }
		});
	};

	/**
	 * Tour - CRUD
	 */
	this.getTourRecords = function() {
		return $http.get('tour/getTourRecords');
	};

	this.addTour = function(data) {
		return $http({
			method: 'POST',
			url: '/tour',
			data: data
		});
	};

	this.updateTour = function(inputs) {
		return $http({
			url: '/tour/' + inputs.id,
			method: 'PUT',
 			data: inputs
		});
	};

	this.deleteTour = function(record) {
		var tourID = record.id;

		return $http.delete('/tour/' + tourID, {
			data: { id: tourID }
		});
	};

}]);