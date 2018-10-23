app.controller('databasesCtrl', function($scope, $http) {

	$scope.service = 'consultTables';
	$scope.user = 'admin';
	$scope.database = 'data_viewer';

	$scope.consultDatabases = function(){

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

	$scope.consultTables = function(){

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
		}, 
		function(response) {
			console.log(response.statusText);
		});

	}

	$scope.consultDatabases();
});