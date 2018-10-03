<?php

require_once(__DIR__ . "\PermissionType.php");

class Permission implements JsonSerializable{
    
    private $databaseName;
    private $permissionType;
    
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
    public function getPermissionType()
    {
        return $this->permissionType;
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
    public function setPermissionType($permissionType)
    {
        $this->permissionType = $permissionType;
    }

    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function __toString(){
        $string = "<b>Database:</b> $this->databaseName, 
                   $this->permissionType";
        return $string;
    }

    
    
}