<!DOCTYPE html>
<html>
    <head>

		<title>Data View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        
        <script src="script/jquery-3.3.1.min.js"></script>
        <script src="script/modal.js"></script>
        
		<script>
			function post(){
				$.post("http://localhost/DataViewer/src/manager/facade.php", 
					{'service': 'consultDatabases',
					 'user': 'admin',
					 'database' : 'none',
					 'table' : 'none'}, 
					function(json){
		        		console.log(json);
		        		console.log("\n\n");
		        		result = JSON.parse(json);
		        		console.log(result);
			    	}
			    );
			}
        </script>

        <style>

        </style>
        
    </head>
    <body onload="post();">
		
    </body>
</html>