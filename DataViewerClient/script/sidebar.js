
function fetchSidebar(){
	$.post("http://localhost/DataViewer/src/manager/facade.php", 
			{'service': 'getMenu'},
			 function(data, status){
				readySidebar(data, status);
			 }
	);
}

function readySidebar(data, status){
	try{
		
		console.log(status);
		console.log(data);
		var menuList = JSON.parse(data);
		console.log(menuList);menuList
		for(k in menuList){
			$("#sidebar ul").append("<li><a href='" + menuList[k] + "' target='content'>" + k + "</a></li>");
		}
		
	} catch (exception) {
		console.log("JSON Inválido:\n" + data);
	}
}
