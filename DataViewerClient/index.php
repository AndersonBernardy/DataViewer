<!DOCTYPE html>
<html>
<head>
<title>DataViewer</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

<style type="text/css">
</style>

</head>
<body data-ng-app="DataViewer">

	<div class="container">
		<div class="container">
			<h1>Data Viewer</h1>
		</div>
		<div class="container">
			<h1>nav-bar</h1>
			<a href="#!databases">Clica aqui</a>
		</div>
		<div data-ng-view></div>
		<div class="container">
			<h1>Footer</h1>
		</div>
	</div>

	<script type="text/javascript">
		var app = angular.module('DataViewer', ["ngRoute"]);
	</script>
	<script src="script/routerConfig.js"></script>
	<script src="script/databasesCtrl.js"></script>

</body>
</html>