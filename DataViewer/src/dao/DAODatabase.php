    <?php

require_once(__DIR__ . "\DAO.php");

class DAODatabase extends DAO{
    
    private function parseResultSet($resultSet){
        $row = $resultSet['0'];
        $connectionParameters = array();
        $connectionParameters['servertype'] = $row['driver'];
        $connectionParameters['servername'] = $row['servername'];
        $connectionParameters['port'] = $row['port'];
        $connectionParameters['charset'] = "utf8";
        $connectionParameters['username'] = $row['username'];
        $connectionParameters['password'] = $row['password'];
        $connectionParameters['dbname'] = $row['dbname'];
        return $connectionParameters;
    }
    
    public function getConnectionParameters($username, $dbname){
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
        $resultSet = $this->query($sql, array($username, $dbname));
        $connectionParameters = $this->parseResultSet($resultSet);
        return $connectionParameters;
    }
    
}