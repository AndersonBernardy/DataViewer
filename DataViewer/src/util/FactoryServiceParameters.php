<?php

    class FactoryServiceParameters{
        
        private $parameters;
        
        private function mountParametersMaskArray(){
            $parametersMaskArray = array();
            array_push($parametersMaskArray, array('service' => 'consultDatabases',
                'user' => TRUE, 'database' => FALSE, 'table' => FALSE));
            array_push($parametersMaskArray, array('service' => 'consultTables',
                'user' => TRUE, 'database' => TRUE, 'table' => FALSE));
            array_push($parametersMaskArray, array('service' => 'consultData',
                'user' => TRUE, 'database' => TRUE, 'table' => TRUE));
            return $parametersMaskArray;
        }
        
        private function getParametersMask($service){
            $parametersMaskArray = $this->mountParametersMaskArray();
            foreach ($parametersMaskArray as $parametersMask){
                if($service === $parametersMask['service']){
                    return $parametersMask;
                }
            }
            return FALSE;
        }
        
        public static function getParameters(){
            $factoryParameters = new FactoryServiceParameters();
            if( isset($_POST['service']) ){
                $parametersMask = $factoryParameters->getParametersMask($_POST['service']);
                if($parametersMask){
                    foreach ($parametersMask as $parameter => $value) {
                        if($value){
                            if( isset($_POST[$parameter]) ){
                                $factoryParameters->parameters[$parameter] = $_POST[$parameter];
                            } else throw new Exception(" $parameter is not set.");
                        }
                    }
                }
            } else throw new Exception("No Service.");
            
            return $factoryParameters->parameters;
        }
    
    }
    
?>