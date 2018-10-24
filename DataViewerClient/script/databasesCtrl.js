app.controller('databasesCtrl', function($scope, $http) {
	
	
	$scope.user = 'admin';
	$scope.url = "http://localhost/DataViewer/DataViewer/src/manager/Manager.php";

	$scope.consultDatabases = function(){

		$scope.service = 'consultDatabases';
		
		$http({
			url : $scope.url,
			method : "POST",
			data: $.param({
				service: $scope.service,
				user: $scope.user,
				database : $scope.database
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			if(response.data.status === "OK"){
				$scope.databaseArray = response.data.result;
			}
			else {
				console.log(response.data.status + "\n" + response.data.result);
				alert("ERRO");
			}
		}, 
		function(response) {
			$scope.msg = response.statusText;
		});

	};

	$scope.consultTables = function(database){

		$scope.service = 'consultTables';
		$scope.database = database;
		
		$http({
			url : $scope.url,
			method : "POST",
			data: $.param({
				service: $scope.service,
				user: $scope.user,
				database : $scope.database
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			if(response.data.status === "OK"){
				$scope.tableArray = response.data.result;
			}
			else {
				console.log(response.data.status + "\n" + response.data.result);
				alert("ERRO");
			}
		}, 
		function(response) {
			console.log(response.statusText);
		});

	}

	$scope.consultData = function(table){

		$scope.service = 'consultData';
		$scope.table = table;
		
		$http({
			url : $scope.url,
			method : "POST",
			data: $.param({
				service: $scope.service,
				user: $scope.user,
				database : $scope.database,
				table : $scope.table
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			if(response.data.status === "OK"){
				$scope.dataArray = response.data.result;
			}
			else {
				console.log(response.data.status + "\n" + response.data.result);
				alert("ERRO");	
			}
		}, 
		function(response) {
			console.log(response.statusText);
		});

	}
	
	$scope.consultDatabases();
	
});