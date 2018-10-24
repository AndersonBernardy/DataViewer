<?php
require_once (__DIR__ . "\DAO.php");
require_once (__DIR__ . "\..\model\Permission.php");

class DAOPermission extends DAO
{

    /**
     *
     * @param array $row
     * @return Permission
     */
    private function parseRow(array $row): Permission
    {
        $dbname = $row['dbname'];
        $selectPrivilege = $row['select_privilege'];
        $updatePrivilege = $row['update_privilege'];
        $insertPrivilege = $row['insert_privilege'];
        $deletePrivilege = $row['delete_privilege'];
        $permission = new Permission($dbname, $selectPrivilege, $insertPrivilege, 
            $updatePrivilege, $deletePrivilege);
        return $permission;
    }

    /**
     *
     * @param array $resultSet
     * @return array
     */
    private function parseResultSet(array $resultSet): array
    {
        $permissionArray = array();
        foreach ($resultSet as $row) {
            $permission = $this->parseRow($row);
            array_push($permissionArray, $permission);
        }
        return $permissionArray;
    }

    /**
     *
     * @param string $username
     * @return array
     */
    public function selectByUsername(string $username): array
    {
        $sql = "SELECT databas.dbname,
                    permission.select_privilege,
                    permission.insert_privilege,
                    permission.update_privilege,
                    permission.delete_privilege     
                FROM user, databas, permission
                WHERE user.username = ?
                    && permission.id_user = user.id_user
                    && permission.id_database = databas.id_database;";
        
        $resultSet = $this->query($sql, array($username));
        $permissionArray = $this->parseResultSet($resultSet);
        return $permissionArray;
    }
}