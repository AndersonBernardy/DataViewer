<div data-ng-controller="databasesCtrl" class="container row">
	<div class="container btn-group-vertical btn-group-lg col-md-2">
		<button type="button" class="btn btn-info" data-ng-click="consultTables()"
			data-ng-repeat="database in databaseArray">{{database.databaseName}}</button>
	</div>
	<div class="container btn-group-vertical btn-group-lg col-md-2">
		<button type="button" class="btn btn-info"
			data-ng-repeat="table in tableArray">{{table}}</button>
	</div>
	<div class="container col-md-8">
		<table class="table table-info"></table>
	</div>
</div>
