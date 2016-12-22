app.service('helper', function(){

	var getIndex = 0;

	// Get the record index
	this.recordIndex = function(array, record) {
		getIndex = array.findIndex(function(element) {
			return element === record;
		});

		return getIndex;
	};

	// Retrieve all records
	this.recordList = function(array, record) {
		return array.map(function(element, index) {
			return index === getIndex ? record : element;
		});
	};
	
});