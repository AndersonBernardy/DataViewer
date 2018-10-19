<?php

require_once (__DIR__ . "\..\util\FactoryServiceParameters.php");
require_once (__DIR__ . "\UCConsultDatabasesManager.php");
require_once (__DIR__ . "\UCConsultTablesManager.php");

class Facade{
    
    private $parameters;
    
    public function __construct(){
//         $this->parameters = FactoryServiceParameters::getParameters();
    }
    
    public function consultDatabases(/*$user*/){
        $manager = new UCConsultDatabasesManager();
//         return $manager->consultDatabases($this->parameters['user']);
        return $manager->consultDatabases('admin');
    }
    
    public function consultTables(/*$user, $database*/){
        $manager = new UCConsultTablesManager();
//         return $manager->consultTables($this->parameters['user'], $this->parameters['database']);
        return $manager->consultTables('admin', 'data_viewer');
    }
    
    public function consultData(/*$user, $database, $table*/){
        $manager = new UCConsultTablesManager();
//         return $manager->consultTables($this->parameters['user'], 
//             $this->parameters['database'], $this->parameters['database']);
        return $manager->consultData('admin', 'data_viewer', 'databas');
    }
    
    public function getMenu(){
        $menu = array();
        $menu['Conta'] = "http:\\\\localhost\DataViewer\DataViewerClient\html\account.php";
        $menu['Bancos'] = "http:\\\\localhost\DataViewer\DataViewerClient\html\databases.php";
        return $menu;
    }
    
    
    
}

try{
    $facade = new Facade();
    $result = null;
    
    $service = $_POST['service'];
//     $service = "getMenu";
    if($service === 'getMenu'){
        $result = $facade->getMenu();
    } else if($service === 'consultData'){
        $result = $facade->consult();
    } else if($service === 'consultDatabases'){
        $result = $facade->consultDatabases();
    } else if($service === 'consultTables'){
        $result = $facade->consultTables();
    }
    
    //tratar
    
    $json = json_encode($result);
    
    
    if(json_last_error() === JSON_ERROR_NONE){
       echo $json;
    } else {
        echo json_last_error_msg();
    }
    
} catch(Exception $exception) {
    echo $exception->getMessage();    
}

?>