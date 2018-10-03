<?php

require_once(__DIR__ . "\..\dao\DAOPermission.php");

class COLPermission{
    
    public function fecthPermissions($username){
        $dao = new DAOPermission();
        $permissionsArray = $dao->selectByUsername($username);
        return $permissionsArray;
    }
    
}


?>