<?php
require_once (__DIR__ . "\..\col\COLPermission.php");
require_once (__DIR__ . "\..\col\COLDatabase.php");
require_once (__DIR__ . "\..\dao\ConnectionFactory.php");
require_once (__DIR__ . "\..\model\ConnectionParameters.php");

class DatabasesManager
{

    /**
     *
     * @param string $username
     * @return array
     */
    public function consultDatabases(string $username): array
    {
        $col = new COLPermission();
        $connection = ConnectionFactory::getDataViewerConnection();

        $permissionArray = $col->fecthPermissions($connection, $username);
        return $permissionArray;
    }

    /**
     *
     * @param string $username
     * @param string $database
     * @return array
     */
    public function consultTables(string $username, string $database): array
    {
        $colDatabase = new COLDatabase();
        $connection = $this->getDatabaseConnection($username, $database);

        $result = $colDatabase->fetchTables($connection);
        return $result;
    }

    /**
     *
     * @param string $username
     * @param string $database
     * @param string $table
     * @return array
     */
    public function consultData(string $username, string $database, string $table): array
    {
        $col = new COLDatabase();
        $connection = $this->getDatabaseConnection($username, $database);

        $result = $col->fetchData($connection, $table);
        return $result;
    }

    public function insertData()
    {}

    public function updateData()
    {}

    public function deleteData()
    {}

    /**
     *
     * @param string $username
     * @param string $database
     * @return PDO
     */
    private function getDatabaseConnection(string $username, string $database): PDO
    {
        $dataViewerConnection = ConnectionFactory::getDataViewerConnection();
        $colDatabase = new COLDatabase();
        $connectionParameters = $colDatabase->getConnectionParameters($dataViewerConnection, $username, $database);
        $connection = ConnectionFactory::createConnection($connectionParameters);
        return $connection;
    }
}

?>