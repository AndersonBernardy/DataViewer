<?php

class PermissionType implements JsonSerializable{

    private $permissionType;
    
    
    public function __construct($permissionType){
        $this->setPermissionType($permissionType);
    }
    
    /**
     * @return mixed
     */
    public function getPermissionType()
    {
        return $this->permissionType;
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
        $string = "<b>Type:</b> $this->permissionType";
        return $string;
    }
    
    
}