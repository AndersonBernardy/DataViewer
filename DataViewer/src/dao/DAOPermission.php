<?php

require_once(__DIR__ . "\DAO.php");
require_once(__DIR__ . "\..\model\Permission.php");

class DAOPermission extends DAO{
    
    private function parseRow($row){
        $permission = new Permission();
        $permission->setDatabaseName($row['dbname']);
        $permission->setPrivilege(new Privilege($row['privilege']));
        return $permission;
    }
    
    private function parseResultSet($resultSet){
        $permissionArray = array();
        foreach ($resultSet as $row) {
            $permission = $this->parseRow($row);
            array_push($permissionArray, $permission);
        }
        return $permissionArray;
    }
    
    public function selectByUsername($username){
        $sql = "SELECT databas.dbname, privilege.privilege 
                    FROM user, databas, permission, privilege
                    WHERE user.username = ?
                    && permission.id_user = user.id_user
                    && permission.id_database = databas.id_database
                    && permission.id_privilege = privilege.id_privilege;";
        $resultSet = $this->query($sql, array($username));
        $permissionArray = $this->parseResultSet($resultSet);
        return $permissionArray;
    }
    
}