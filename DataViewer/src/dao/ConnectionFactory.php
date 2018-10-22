<?php

class ConnectionFactory{
        
    public static function createConnection($servertype, $servername, $port, $dbname, 
        $username, $password, $charset = "utf8"){

        $connectionString = "$servertype:" .
                            "host=$servername;" .
                            "port=$port;" .
                            "dbname=$dbname;" .
                            "charset=$charset";
        
        $connection = new PDO($connectionString, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $connection;
    }
    
    public static function createConnection2($connectionParameters){
            
        $servertype = $connectionParameters['servertype'];
        $servername = $connectionParameters['servername'];
        $port = $connectionParameters['port'];
        $dbname = $connectionParameters['dbname'];
        $charset = $connectionParameters['charset'];
        $username = $connectionParameters['username'];
        $password = $connectionParameters['password'];
        
        $connectionString = "$servertype:host=$servername;port=$port;dbname=$dbname;charset=$charset";
        
        $connection = new PDO($connectionString, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $connection;
    }

}

?>