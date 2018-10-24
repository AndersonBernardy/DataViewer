<?php
require_once (__DIR__ . "\DatabasesManager.php");
require_once (__DIR__ . "\..\model\Response.php");
require_once (__DIR__ . "\..\util\InvalidParameterException.php");

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
            throw new InvalidParameterException("user is not set.");
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
                throw new InvalidParameterException("user is not set.");
            } else if (! isset($_POST['database'])) {
                throw new InvalidParameterException("database is not set.");
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
                throw new InvalidParameterException("user is not set.");
            } else if (! isset($_POST['database'])) {
                throw new InvalidParameterException("database is not set.");
            } else if (! isset($_POST['table'])) {
                throw new InvalidParameterException("table is not set.");
            }
        }
    }
    
    private function insertData(){}
    
    private function updateData(){}
    
    private function deleteData(){}
    
    

    /**
     *
     * @throws InvalidParameterException
     */
    public function main()
    {
        $response = new Response();
        try {

            if (isset($_POST['service'])) {
                $service = $_POST['service'];
            } else {
                throw new InvalidParameterException("service is not set.");
            }

            if ($service === 'consultData') {
                $result = $this->consultData();
            } else if ($service === 'consultDatabases') {
                $result = $this->consultDatabases();
            } else if ($service === 'consultTables') {
                $result = $this->consultTables();
            } else if ($service === 'insertData') {
                $result = $this->insertData();
            } else if ($service === 'updateData') {
                $result = $this->updateData();
            } else if ($service === 'deleteData') {
                $result = $this->deleteData();
            } else {
                throw new InvalidParameterException("Invalid service.");
            }

            $response->setStatus("OK");
            $response->setResult($result);
            
            $json = json_encode($response);
            
            echo $json;
            
        } catch (Exception $e) {
            $response->setStatus("ERROR");
            $response->setResult($e->getMessage());
            $json = json_encode($response);
            echo $json;
        }
    }
}

// teste("consultData");

new Manager();


function teste($service)
{
    $_POST['service'] = $service;
    $_POST['user'] = 'admin';
    $_POST['database'] = 'data_viewer';
    $_POST['table'] = 'server';
}

?>