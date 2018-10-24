<?php

class ConnectionFactory
{

    /**
     *
     * @param ConnectionParameters $connectionParameters
     * @return PDO
     */
    public static function createConnection(ConnectionParameters $connectionParameters): PDO
    {
        $servertype = $connectionParameters->getServertype();
        $host = $connectionParameters->getHost();
        $port = $connectionParameters->getPort();
        $dbname = $connectionParameters->getDbname();
        $charset = $connectionParameters->getCharset();
        $username = $connectionParameters->getUsername();
        $password = $connectionParameters->getPassword();

        $connectionString = "$servertype:host=$host;port=$port;dbname=$dbname;charset=$charset";
        $connection = new PDO($connectionString, $username, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        if($connection === null){
            throw new Exception("Erro ao conectar com o banco de dados.");
        }
        return $connection;
    }

    /**
     *
     * @return PDO
     */
    public static function getDataViewerConnection(): PDO
    {
        $connectionParameters = new ConnectionParameters("mysql", "localhost", 3306, 
            "data_viewer", "utf8", "root", "");
        return ConnectionFactory::createConnection($connectionParameters);
    }
}

?>