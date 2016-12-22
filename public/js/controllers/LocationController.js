app.controller('LocationController', ['$scope', '$http', '$log', 'crud', 'display', function($scope, $http, $log, crud, display){

	$scope.records = {};
	$scope.inputs = {};
	$scope.errors = {};
	$scope.isError = true;
	$scope.isSuccess = false;
	$scope.message = '';
	$scope.isCreate = true;
	$scope.isEdit = true;
	$scope.isTableShow = false;
	$scope.recordsCount = 0;

	var getRecords = function() {
		crud.getLocationRecords().then(function(result) {
			$scope.records = result.data.locations;
			$scope.recordsCount = $scope.records.length;

			// check if there is records in db then show results to table
			$scope.isTableShow = ($scope.recordsCount > 0) ? true : false;
		}, function(error) {
			$log.warn(error.data);
		});
	};
	getRecords();

	var buttonToggleVisibility = function(isEdit, isCreate) {
		$scope.isEdit = isEdit;
		$scope.isCreate = isCreate;
	};

	var errorSuccessStatus = function(errStat, succStat) {
		$scope.isError = errStat;
		$scope.isSuccess = succStat;
	};

	var clearInputsAndMessage = function(message) {
		$scope.message = '1 record has successfully ' + message;
		$scope.inputs = { location: '', title: '' };
		buttonToggleVisibility(true, true);
		$scope.isTableShow = true;
	};

	$scope.addLocation = function(inputs) {
		crud.addLocation(inputs);
		/*crud.addLocation(inputs).then(function(result) {
			$scope.isError = true;
			errorSuccessStatus(true, true);

			// check if save and return true
			if(result.data.success) {
				clearInputsAndMessage('saved');

				// add this data into the table
				$scope.records.push(result.data.location);
			}
		}, function(error) {
			$scope.errors = error.data;
			errorSuccessStatus(false, false);
		});*/
	};

	$scope.editLocation = function(record) {
		$scope.inputs = {
			id: record.id,
			location: record.location,
			title: record.title,
			description: record.description
		};
		errorSuccessStatus(true, false);
		buttonToggleVisibility(false, false);
	};

	$scope.updateLocation = function(inputs) {
		crud.updateLocation(inputs).then(function(result) {
			if (result.data.success) {
				$scope.isEdit = false;
				getRecords();
				errorSuccessStatus(true, true);
				clearInputsAndMessage('updated');
			}
		}, function(error) {
			$scope.errors = error.data;
			$scope.isError = false;
		});
	};

	$scope.cancel = function() {
		$scope.isEdit = false;
		clearInputsAndMessage();
	};

	$scope.deleteLocation = function(record) {
		crud.deleteLocation(record).then(function(response) {
			if (response.data.success) {
				var newArray = $scope.records.filter(function(val) {
					return val != record;
				});
				$scope.records = newArray;	
			}
		});
	};

	$scope.uploadFile = function() {
	    var file = $scope.myFile;

	    console.log('file is ');
	    console.dir(file);

	    var uploadUrl = "/fileUpload";
	    fileUpload.uploadFileToUrl(file, uploadUrl);
	};

	$scope.upload = function() {

		var fd = new FormData();

		fd.append('file', file);
		fd.append('data', 'string');
		$http.post(uploadUrl, fd, {
		        transformRequest: angular.identity,
		        headers: { 'Content-Type': undefined }
		    })
		    .success(function() {})
		    .error(function() {}
		);

	};

}]);