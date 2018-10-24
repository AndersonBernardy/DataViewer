<?php
require_once (__DIR__ . "\..\dao\DAOPermission.php");

class COLPermission
{

    /**
     *
     * @param PDO $connection
     * @param string $username
     * @return array
     */
    public function fecthPermissions(PDO $connection, string $username): array
    {
        $dao = new DAOPermission($connection);
        $permissionsArray = $dao->selectByUsername($username);
        return $permissionsArray;
    }
}

?>