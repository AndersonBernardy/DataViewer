<?php

require_once(__DIR__ . "\..\col\COLPermission.php");
require_once(__DIR__ . "\..\col\COLTable.php");


class DatabasesManager{
    
    public function consultDatabases($username){
        $col = new COLPermission();
        $permissionArray = $col->fecthPermissions($username);
        return $permissionArray;
    }

    public function consultTables($username, $database){
        $col = new COLTable();
        $result = $col->fetchTables($username, $database);
        return $result;
    }
    
    public function consultData($username, $database, $table){
        $col = new COLTable();
        $result = $col->fetchData($username, $database, $table);
        return $result;
    }
    
}

?>