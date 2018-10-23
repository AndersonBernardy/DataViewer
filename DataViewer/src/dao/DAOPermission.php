<?php

require_once(__DIR__ . "\DAO.php");
require_once(__DIR__ . "\..\model\Permission.php");

class DAOPermission extends DAO{
    
    private function parseRow($row){
        $permission = new Permission();
        $permission->setDatabaseName($row['dbname']);
        $permission->getSelectPrivilege($row['select_privilege']);
        $permission->getUpdatePrivilege($row['update_privilege']);
        $permission->getInsertPrivilege($row['insert_privilege']);
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
        $sql = "SELECT databas.dbname,
                    permission.select_privilege,
                    permission.insert_privilege,
                    permission.update_privilege     
                FROM user, databas, permission
                WHERE user.username = ?
                    && permission.id_user = user.id_user
                    && permission.id_database = databas.id_database;";
        $resultSet = $this->query($sql, array($username));
        $permissionArray = $this->parseResultSet($resultSet);
        return $permissionArray;
    }
    
}