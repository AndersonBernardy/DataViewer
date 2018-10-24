<?php
require_once (__DIR__ . "\DatabasesManager.php");

class Manager
{

    /**
     */
    public function __construct()
    {
        $this->main();
    }

    /**
     *
     * @throws InvalidParameterException
     * @return array
     */
    private function consultDatabases()
    {
        $manager = new DatabasesManager();
        if (isset($_POST['user'])) {
            return $manager->consultDatabases($_POST['user']);
        } else {
            throw new InvalidParameterException("user");
        }
    }

    /**
     *
     * @throws InvalidParameterException
     * @return array
     */
    private function consultTables()
    {
        $manager = new DatabasesManager();
        if (isset($_POST['user']) && isset($_POST['database'])) {
            return $manager->consultTables($_POST['user'], $_POST['database']);
        } else {
            if (! isset($_POST['user'])) {
                throw new InvalidParameterException("user");
            } else if (! isset($_POST['database'])) {
                throw new InvalidParameterException("database");
            }
        }
    }

    /**
     *
     * @throws InvalidParameterException
     * @return array
     */
    private function consultData()
    {
        $manager = new DatabasesManager();
        if (isset($_POST['user']) && isset($_POST['database']) && isset($_POST['table'])) {
            return $manager->consultData($_POST['user'], $_POST['database'], $_POST['table']);
        } else {
            if (! isset($_POST['user'])) {
                throw new InvalidParameterException("user");
            } else if (! isset($_POST['database'])) {
                throw new InvalidParameterException("database");
            } else if (! isset($_POST['table'])) {
                throw new InvalidParameterException("table");
            }
        }
    }

    /**
     *
     * @throws InvalidParameterException
     */
    public function main()
    {
        try {

            if (isset($_POST['service'])) {
                $service = $_POST['service'];
            } else {
                throw new InvalidParameterException("service");
            }

            if ($service === 'consultData') {
                $result = $this->consultData();
            } else if ($service === 'consultDatabases') {
                $result = $this->consultDatabases();
            } else if ($service === 'consultTables') {
                $result = $this->consultTables();
            }

            $json = json_encode($result);

            if (json_last_error() === JSON_ERROR_NONE) {
                echo $json;
            } else {
                echo json_last_error_msg();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

new Manager();

?>