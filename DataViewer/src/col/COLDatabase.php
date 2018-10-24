<?php
require_once (__DIR__ . "\..\dao\DAODatabase.php");
require_once (__DIR__ . "\..\dao\ConnectionFactory.php");
require_once (__DIR__ . "\..\model\ConnectionParameters.php");

class COLDatabase
{

    /**
     *
     * @param PDO $connection
     * @param string $username
     * @param string $database
     * @return ConnectionParameters
     */
    public function getConnectionParameters(PDO $dataViwerConnection, string $username, 
        string $database): ConnectionParameters
    {
        $daoDatabase = new DAODatabase($dataViwerConnection);

        $connectionParameters = $daoDatabase->getConnectionParameters($username, $database);
        return $connectionParameters;
    }

    /**
     *
     * @param PDO $connection
     * @return array
     */
    public function fetchTables(PDO $connection): array
    {
        $daoDatabase = new DAODatabase($connection);

        $tableArray = $daoDatabase->showTables();
        return $tableArray;
    }

    /**
     *
     * @param PDO $connection
     * @param string $table
     * @return array
     */
    public function fetchData(PDO $connection, string $table): array
    {
        $daoDatabase = new DAODatabase($connection);

        $resultSet = $daoDatabase->selectAllTable($table);
        return $resultSet;
    }
}