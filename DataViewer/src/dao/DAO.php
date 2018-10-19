<?php

    require_once(__DIR__ . "\SingletonConnection.php");

    abstract class DAO{

        protected $connection;

        public function __construct(){
            $this->connection = SingletonConnection::getConnection();
        }

        protected function getConnection(){
            return $this->connection;
        }

        protected function execute($sql, $args = array()){
            $statement = $this->connection->prepare($sql);

            $i = 0;
            foreach ($args as $argument) {
                $statement->bindValue($i + 1, $argument , PDO::PARAM_STR);
                $i++;
            }

            $statement->execute();
        }

        protected function query($sql, $args = array()){
            $statement = $this->connection->prepare($sql);
            $i = 0;
            foreach ($args as $argument) {
                $statement->bindValue($i + 1, $argument , PDO::PARAM_STR);
                $i++;
            }
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);            
            return $result;
        }

    }

?>