<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
 		<link rel="stylesheet" type="text/css" href="../css/grid.css">
        <link rel="stylesheet" type="text/css" href="../css/button-list.css">
        
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/databases.css">
        
        <script src="../script/jquery-3.3.1.min.js"></script>
        <script src="../script/sidebar.js"></script>
        <script src="../script/databases.js"></script>
        
        <script type="text/javascript">

        </script>

        <style type="text/css">
    

        </style>
        
    </head>
    <body onload="fetchDatabases()">
		<div class="wrapper flex-container col-m-12">
			<div id="databases" class= "col-m-2">
				<h3 class="list-heading">Bancos</h3>
				<ul class="button-list"></ul>
			</div>
			<div id="tables" class= "col-m-2">
				<h3 class="list-heading">Tabelas</h3>
				<ul class="button-list"></ul>
			</div>
			<div id="results" class= "col-m-8">
				<table class="table"></table>
			</div>
		</div>
    </body>
</html>

