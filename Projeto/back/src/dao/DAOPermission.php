<?php

require_once(__DIR__ . "\DAO.php");
require_once(__DIR__ . "\..\model\Permission.php");

class DAOPermission extends DAO{
    
    private function parseRow($row){
        $permission = new Permission();
        $permission->setDatabaseName($row['name']);
        $permission->setPermissionType(new PermissionType($row['permissionType']));
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
        $sql = "SELECT data.name, permissionType.permissionType 
                    FROM user, data, permission, permissionType
                    WHERE user.login = ?
                    && permission.idUser = user.idUser
                    && permission.idDatabase = data.idDatabase
                    && permission.idPermissionType = permissionType.idPermissionType;";
        $resultSet = $this->query($sql, array($username));
        $permissionArray = $this->parseResultSet($resultSet);
        return $permissionArray;
    }
    
}