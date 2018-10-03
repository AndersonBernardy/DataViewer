<?php

require_once(__DIR__ . "\DAO.php");

class DAOTable extends DAO{
    
    public function __construct($connection){
        $this->connection = $connection;
    }
    
    private function parseRow($row){
        foreach ($row as $table) {
            return $table;
        }
    }
    
    private function parseResultSet($resultSet){
        $tableArray = array();
        foreach ($resultSet as $row) {
            $table = $this->parseRow($row);
            array_push($tableArray, $table);
        }
        return $tableArray;
    }
    
    public function showTables(){
        $sql = "SHOW TABLES";
        $resultSet = $this->query($sql);
        $tableArray = $this->parseResultSet($resultSet);
        return $tableArray;
    }
    
    public function selectAllTable($table){
        $sql = "SELECT * FROM $table;";
        $resultSet = $this->query($sql);
        return $resultSet;
    }
    
}