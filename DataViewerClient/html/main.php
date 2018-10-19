<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/grid.css">
        <link rel="stylesheet" type="text/css" href="../css/button-list.css">
        
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        
        <script src="../script/jquery-3.3.1.min.js"></script>
        <script src="../script/sidebar.js"></script>
        
        <script type="text/javascript">

        </script>

        <style type="text/css">

        </style>
        
    </head>
    <body onload="fetchSidebar()">
        <div class="wrapper col-m-12 col-l-12">
        	<div class="top-nav col-m-12 col-l-12">
        		<h1>Data View</h1>
        	</div>
            <div id="container" class="container flex-container col-m-12 col-l-12">
        		<div id="sidebar" class="sidebar col-m-2 col-l-2">
        			<ul class="button-list"></ul>
        		</div>
        		<div id="content" class="col-m-10 col-l-10">
        			<iframe name="content" src=""></iframe>
        		</div>
        	</div>
        </div>
    </body>
</html>
