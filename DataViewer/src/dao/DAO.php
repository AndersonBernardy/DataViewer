<?php

abstract class DAO
{

    protected $connection;

    /**
     *
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return bool
     */
    protected function execute(string $sql, array $args = array()): bool
    {
        $statement = $this->connection->prepare($sql);

        $i = 0;
        foreach ($args as $argument) {
            $statement->bindValue($i + 1, $argument, PDO::PARAM_STR);
            $i ++;
        }

        return $statement->execute();
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return array
     */
    protected function query(string $sql, array $args = array()): array
    {
        $statement = $this->connection->prepare($sql);

        $i = 1;
        foreach ($args as $argument) {
            $statement->bindValue($i, $argument, PDO::PARAM_STR);
            $i ++;
        }

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>