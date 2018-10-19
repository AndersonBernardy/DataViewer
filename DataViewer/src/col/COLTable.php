<?php

require_once(__DIR__ . "\COLDatabase.php");
require_once(__DIR__ . "\..\dao\FactoryConnection.php");
require_once(__DIR__ . "\..\dao\DAOTable.php");

class COLTable{
    
    public function fetchTables($username, $database){
        $colDatabase = new COLDatabase();
        $connection = $colDatabase->getDatabaseConnection($username, $database);
        
        $daoTable = new DAOTable($connection);
        $tableArray = $daoTable->showTables();
        return $tableArray;
    }
    
    public function fetchData($username, $database, $table){
        $colDatabase = new COLDatabase();
        $connection = $colDatabase->getDatabaseConnection($username, $database);
        
        $daoTable = new DAOTable($connection);
        $resultSet = $daoTable->selectAllTable($table);
        return $resultSet;
    }
    
}