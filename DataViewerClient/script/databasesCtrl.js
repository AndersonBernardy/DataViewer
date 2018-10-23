app.controller('databasesCtrl', function($scope, $http) {
	
	
	$scope.user = 'admin';
	

	$scope.consultDatabases = function(){

		$scope.service = 'consultDatabases';
		
		$http({
			url : "http://localhost/DataViewer/DataViewer/src/manager/Facade.php",
			method : "POST",
			data: $.param({
				service: $scope.service,
				user: $scope.user,
				database : $scope.database
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			$scope.databaseArray = response.data;
			console.log($scope.databaseArray);
			console.log(response.statusText);
		}, 
		function(response) {
			$scope.msg = response.statusText;
		});

	};

	$scope.consultTables = function(database){

		$scope.service = 'consultTables';
		$scope.database = database;
		
		$http({
			url : "http://localhost/DataViewer/DataViewer/src/manager/Facade.php",
			method : "POST",
			data: $.param({
				service: $scope.service,
				user: $scope.user,
				database : $scope.database
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			$scope.tableArray = response.data;
			console.log($scope.tableArray);
		}, 
		function(response) {
			console.log(response.statusText);
		});

	}

	$scope.consultData = function(table){

		$scope.service = 'consultData';
		$scope.table = table;
		
		$http({
			url : "http://localhost/DataViewer/DataViewer/src/manager/Facade.php",
			method : "POST",
			data: $.param({
				service: $scope.service,
				user: $scope.user,
				database : $scope.database,
				table : $scope.table
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			$scope.dataArray = response.data;
			console.log($scope.dataArray);
		}, 
		function(response) {
			console.log(response.statusText);
		});

	}
	
	$scope.consultDatabases();
});