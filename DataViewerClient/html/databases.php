<div data-ng-controller="databasesCtrl" class="container row">
	<div class="container btn-group-vertical btn-group-lg col-md-2">
		<button type="button" class="btn btn-info"
			data-ng-click="consultTables(this.database.databaseName)"
			data-ng-repeat="database in databaseArray">{{database.databaseName}}</button>
	</div>
	<div class="container btn-group-vertical btn-group-lg col-md-2">
		<button type="button" class="btn btn-info"
			data-ng-click="consultData(this.table)"
			data-ng-repeat="table in tableArray">{{table}}</button>
	</div>
	<div class="container col-md-8">
		<table class="table table-info">
			<tr>
				<th data-ng-repeat="(key, data) in dataArray[0]">{{key}}</th>
			</tr>
			<tr data-ng-repeat="row in dataArray">
				<td data-ng-repeat="data in row">{{data}}</td>
			</tr>
		</table>
	</div>
</div>
