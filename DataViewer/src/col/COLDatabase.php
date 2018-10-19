<?php

require_once(__DIR__ . "\..\dao\DAODatabase.php");
require_once(__DIR__ . "\..\dao\FactoryConnection.php");

class COLDatabase{
    
    public function getDatabaseConnection($username, $database){
        $daoDatabase = new DAODatabase();
        $connectionParameters = $daoDatabase->getConnectionParameters($username, $database);
        $connection = FactoryConnection::createConnection2($connectionParameters);
        return $connection;
    }
    
}