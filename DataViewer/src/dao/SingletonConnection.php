<?php

    require_once(__DIR__ . "\ConnectionFactory.php");

    class SingletonConnection{

        private static $instance = null;
        private $connection;

        private function __construct(){
            $credentials = $this->getCredentials();
            $this->connection = ConnectionFactory::createConnection(
                $credentials["servertype"],
                $credentials["host"],
                $credentials["port"],
                $credentials["dbname"],
                $credentials["username"],
                $credentials["password"],
                $credentials["charset"]
            );
        }

        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new SingletonConnection();
            }
            return self::$instance;
        }

        public static function getConnection(){
            return self::getInstance()->connection;
        }

        private function getCredentials(){
            return array(
                "servertype"=>"mysql",
                "host"=>"localhost",
                "port"=>"3306",
                "dbname"=>"data_viewer",
                "charset"=>"utf8",
                "username"=>"root",
                "password"=>""
            );   
        }

        public function __destruct(){
            $this->connection = null;
        }

    }

?>