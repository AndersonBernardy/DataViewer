<?php

require_once (__DIR__ . "\..\util\FactoryServiceParameters.php");
require_once (__DIR__ . "\DatabasesManager.php");

class Manager{
    
    private $parameters;
    
    public function __construct(){
        $this->parameters = FactoryServiceParameters::getParameters();
    }
    
    public function consultDatabases(/*$user*/){
        $manager = new DatabasesManager();
        return $manager->consultDatabases($this->parameters['user']);
//         return $manager->consultDatabases('admin');
    }
    
    public function consultTables(/*$user, $database*/){
        $manager = new DatabasesManager();
        return $manager->consultTables($this->parameters['user'], $this->parameters['database']);
//         return $manager->consultTables('admin', 'data_viewer');
    }
    
    public function consultData(/*$user, $database, $table*/){
        $manager = new DatabasesManager();
        return $manager->consultData($this->parameters['user'], 
            $this->parameters['database'], $this->parameters['table']);
//         return $manager->consultData('admin', 'data_viewer', 'databas');
    }  
    
}

try{
    
    $facade = new Manager();
    $result = null;
    
    $service = $_POST['service'];
//     $service = 'consultDatabases';
    
    if($service === 'consultData'){
        $result = $facade->consultData();
    } else if($service === 'consultDatabases'){
        $result = $facade->consultDatabases();
    } else if($service === 'consultTables'){
        $result = $facade->consultTables();
    }
    
    $json = json_encode($result);
    
    if(json_last_error() === JSON_ERROR_NONE){
       echo $json;
    } else {
        echo json_last_error_msg();
    }
    
} catch(Exception $exception) {
    echo json_encode($exception->getMessage());    
}

?>