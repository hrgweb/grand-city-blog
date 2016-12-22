app.controller('FoodController', ['$scope', '$http', 'crud', 'helper', function($scope, $http, crud, helper) {

	$scope.records = {};
	$scope.recordsCount = 0;
	$scope.isCreate = true;
	$scope.isEdit = true;
	$scope.isTableShow = false;
	$scope.isSuccess = false;
	$scope.errors = {};
	$scope.isError = true;
	$scope.message = '';
	$scope.inputs = {};

	var getFoodRecords = function() {
		crud.getFoodRecords().then(function(result) {
			$scope.records = result.data.foods;
			$scope.recordsCount = $scope.records.length;

			// check if there is records in db then show results to table
			$scope.isTableShow = ($scope.recordsCount > 0) ? true : false;
		});
	};
	getFoodRecords();

	var errorSuccessStatus = function(errStat, succStat) {
		$scope.isError = errStat;
		$scope.isSuccess = succStat;
	};

	var buttonToggleVisibility = function(isEdit, isCreate) {
		$scope.isEdit = isEdit;
		$scope.isCreate = isCreate;
	};

	var clearInputsAndMessage = function(message) {
		$scope.message = '1 record has successfully ' + message;
		$scope.inputs = { name: '', description: '' };
		buttonToggleVisibility(true, true);
		$scope.isTableShow = true;
	};

	$scope.addFood = function(inputs) {
		crud.addFood($scope.inputs).then(function(result) {
			$scope.isError = true;
			errorSuccessStatus(true, true);

			// check if save and return true
			if(result.data.success) {
				clearInputsAndMessage('saved');

				// add this data into the table
				$scope.records.push(result.data.food);
			}
		}, function(error) {
			$scope.errors = error.data;
			errorSuccessStatus(false, false);
		});
	};

	$scope.editFood = function(record) {
		$scope.inputs = {
			id: record.id,
			name: record.name,
			description: record.description
		};
		errorSuccessStatus(true, false);
		buttonToggleVisibility(false, false);

		// Get the record index in the $scope.records
		helper.recordIndex($scope.records, record);
	};

	$scope.updateFood = function(inputs) {
		crud.updateFood(inputs).then(function(result) {
			var data = result.data;

			if (data.success) {
				$scope.isEdit = false;
				$scope.records = helper.recordList($scope.records, data.result);

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

	$scope.deleteFood = function(record) {
		crud.deleteFood(record).then(function(response) {
			if (response.data.success) {
				var newArray = $scope.records.filter(function(val) {
					return val != record;
				});
				$scope.records = newArray;	
			}
		});
	};

}]);