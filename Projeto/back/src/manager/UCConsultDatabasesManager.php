<?php

require_once(__DIR__ . "\..\col\COLPermission.php");


class UCConsultDatabasesManager{
    
    public function consultDatabases($username){
        $col = new COLPermission();
        $permissionArray = $col->fecthPermissions($username);
        return $permissionArray;
    }
    
}

?>