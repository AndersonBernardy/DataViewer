<?php

require_once(__DIR__ . "\..\col\COLPermission.php");
require_once(__DIR__ . "\..\col\COLTable.php");


class DatabasesManager{
    
    public function consultDatabases(string $username) : array {
        
        $col = new COLPermission();
        $permissionArray = $col->fecthPermissions($username);
        return $permissionArray;
    }

    public function consultTables(string $username, string $database){
        $col = new COLTable();
        $result = $col->fetchTables($username, $database);
        return $result;
    }
    
    public function consultData(string $username, string $database, string $table){
        $col = new COLTable();
        $result = $col->fetchData($username, $database, $table);
        return $result;
    }
    
    public function insertData(){
        
    }
    
    public function updateData(){
        
    }
    
    public function deleteData(){
        
    }
    
}

?>