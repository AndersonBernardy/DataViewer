<?php

require_once(__DIR__ . "\Privilege.php");

class Permission implements JsonSerializable{
    
    private $databaseName;
    private $privilege;
    
     /**
     * @return mixed
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    /**
     * @return mixed
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * @param mixed $databaseName
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    /**
     * @param mixed $permissionType
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
    }

    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function __toString(){
        $string = "<b>Database:</b> $this->databaseName, 
                   $this->privilege";
        return $string;
    }

    
    
}