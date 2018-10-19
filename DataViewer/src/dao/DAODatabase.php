<?php

require_once(__DIR__ . "\DAO.php");

class DAODatabase extends DAO{
    
    private function parseResultSet($resultSet, $database){
        $row = $resultSet['0'];
        $connectionParameters = array();
        $connectionParameters['servertype'] = $row['serverType'];
        $connectionParameters['servername'] = $row['serverName'];
        $connectionParameters['port'] = $row['port'];
        $connectionParameters['charset'] = "utf8";
        $connectionParameters['username'] = $row['user'];
        $connectionParameters['password'] = $row['password'];
        $connectionParameters['dbname'] = $database;
        return $connectionParameters;
    }
    
    public function getConnectionParameters($username, $database){
        $sql = "SELECT data.name, 
                    servertype.serverType,
                    server.serverName, 
                    server.port,
                    server.user,
                    server.password
                FROM data, permission, server, serverType, user 
                WHERE user.login = ?
                    && data.name = ?
                    && user.idUser = permission.idUser
                    && permission.idDatabase = data.idDatabase
                    && data.idServer = server.idServer
                    && server.idServerType = servertype.idServerType;";
        $resultSet = $this->query($sql, array($username, $database));
        $connectionParameters = $this->parseResultSet($resultSet, $database);
        return $connectionParameters;
    }
    
}

// require_once(__DIR__ . "/FactoryConnection.php");

// $dao = new DAODatabase();
// $pr = $dao->getConnectionParameters('admin', 'dataview');
// print_r($pr);
// FactoryConnection::createConnection2($pr);




