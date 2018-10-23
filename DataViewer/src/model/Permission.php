<?php

class Permission implements JsonSerializable{
    
    private $databaseName;
    private $selectPrivilege;
    private $insertPrivilege;
    private $updatePrivilege;
    
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
    public function getSelectPrivilege()
    {
        return $this->selectPrivilege;
    }

    /**
     * @return mixed
     */
    public function getInsertPrivilege()
    {
        return $this->insertPrivilege;
    }

    /**
     * @return mixed
     */
    public function getUpdatePrivilege()
    {
        return $this->updatePrivilege;
    }

    /**
     * @param mixed $databaseName
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }

    /**
     * @param mixed $selectPrivilege
     */
    public function setSelectPrivilege($selectPrivilege)
    {
        $this->selectPrivilege = $selectPrivilege;
    }

    /**
     * @param mixed $insertPrivilege
     */
    public function setInsertPrivilege($insertPrivilege)
    {
        $this->insertPrivilege = $insertPrivilege;
    }

    /**
     * @param mixed $updatePrivilege
     */
    public function setUpdatePrivilege($updatePrivilege)
    {
        $this->updatePrivilege = $updatePrivilege;
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