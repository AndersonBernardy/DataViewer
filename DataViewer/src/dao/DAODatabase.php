<?php
require_once (__DIR__ . "\DAO.php");
require_once (__DIR__ . "\..\model\ConnectionParameters.php");

class DAODatabase extends DAO
{

    /**
     *
     * @param array $row
     * @return ConnectionParameters
     */
    private function parseParametersResultSet(array $row): ConnectionParameters
    {
        $servertype = $row['driver'];
        $host = $row['servername'];
        $port = $row['port'];
        $charset = "utf8";
        $username = $row['username'];
        $password = $row['password'];
        $dbname = $row['dbname'];
        $connectionParameters = new ConnectionParameters($servertype, $host, $port, 
            $dbname, $charset, $username, $password);
        return $connectionParameters;
    }

    /**
     *
     * @param string $username
     * @param string $dbname
     * @return ConnectionParameters
     */
    public function getConnectionParameters(string $username, string $dbname)
    {
        $sql = "SELECT databas.dbname, 
                    servertype.driver,
                    server.servername, 
                    server.port,
                    server.username,
                    server.password
                FROM databas, permission, server, servertype, user 
                WHERE user.username = ?
                    && databas.dbname = ?
                    && user.id_user = permission.id_user
                    && permission.id_database = databas.id_database
                    && databas.id_server = server.id_server
                    && server.id_servertype = servertype.id_servertype;";

        $resultSet = $this->query($sql, array(
            $username,
            $dbname
        ));
        $connectionParameters = $this->parseParametersResultSet($resultSet[0]);
        return $connectionParameters;
    }
    
    /**
     * 
     * @param array $resultSet
     * @return array
     */
    private function parseTablesResultSet(array $resultSet): array{
        $tableArray = array();
        foreach ($resultSet as $row) {
            foreach ($row as $table) {
                array_push($tableArray, $table);
            }
        }
        return $tableArray;
    }
    
    /**
     * 
     * @return array
     */
    public function showTables(): array{
        $sql = "SHOW TABLES";
        
        $resultSet = $this->query($sql);
        $tableArray = $this->parseTablesResultSet($resultSet);
        return $tableArray;
    }
    
    /**
     * 
     * @param string $table
     * @return array
     */
    public function selectAllTable(string $table): array{
        $sql = "SELECT * FROM $table;";
        
        $resultSet = $this->query($sql);
        return $resultSet;
    }
}