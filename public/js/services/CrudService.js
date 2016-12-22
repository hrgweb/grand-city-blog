app.service('crud', ['$http', function($http){
	
	/**
	 * Location - CRUD
	 */

	this.getLocationRecords = function() {
		return $http.get('/location/getLocationRecords');
	};

	this.addLocation = function(inputs) {
		/*return $http({
			method: 'POST',
			url: '/location',
			data: inputs
		});*/

		var fd = new FormData($('form#formLocation'));

		// fd.append('file', file);
		// fd.append('data', 'string');
		// fd.append('avatar', inputs);

		// console.log(fd);
		console.log(inputs);

		/*$http.post('/location', fd, {
		        transformRequest: angular.identity,
		        headers: { 'Content-Type': undefined }
		    })
		    .success(function() {
		    	
		    })
		    .error(function() {}
		);*/
	};

	this.updateLocation = function(inputs) {
		return $http.put('/location/' + inputs.id,{
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
		return $http.put('/food/' + inputs.id,{
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
		return $http.put('/tour/' + inputs.id,{
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