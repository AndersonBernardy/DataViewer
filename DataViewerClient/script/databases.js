function fetchDatabases(){
	$.post("http://localhost/DataViewer/src/manager/facade.php", 
			{'service': 'consultDatabases',
			 'user': 'admin',
			 'database' : 'none',
			 'table' : 'none'}, 
			 function(data, status){
				 readyDatabases(data, status);
			 }
	);
}

function readyDatabases(data, status){
	try{
		
		console.log(status);
		var databasesList = JSON.parse(data);
		console.log(databasesList);
		
		var i;
		for(i=0; i<databasesList.length; i++){
			$("#databases ul").append("<li><a>" + databasesList[i]['databaseName'] + "</a></li>");
		}
		$("#databases ul li a")
			.on("click", function(){
				fetchTables($(this).text());
			});
		
	} catch (exception) {
		console.log(exception);
		console.log("JSON Inválido:\n" + data);
	}
}

function fetchTables(tableName){
	$.post("http://localhost/DataViewer/src/manager/facade.php", 
			{'service': 'consultTables',
			 'user': 'admin',
			 'database' : 'dataview',
			 'table' : 'server'}, 
			 function(data, status){
				 readyTables(data, status);
			 }
	);
}

function readyTables(data, status){
	try{
		console.log(status);
		var databasesList = JSON.parse(data);
		console.log(databasesList);
		$("#tables ul").html("");
		for(var i=0; i<databasesList.length; i++){
			$("#tables ul").append("<li><a>" + databasesList[i] + "</a></li>").on("click", );
		}
		
	} catch (exception) {
		console.log(exception);
		console.log("JSON Inválido:\n" + data);
	}
}