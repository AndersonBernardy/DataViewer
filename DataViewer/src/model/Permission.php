<?php

class Permission implements JsonSerializable
{

    private $databaseName;
    private $selectPrivilege;
    private $insertPrivilege;
    private $updatePrivilege;
    private $deletePrivilege;

    /**
     *
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     *
     * @return bool
     */
    public function getSelectPrivilege(): bool
    {
        return $this->selectPrivilege;
    }

    /**
     *
     * @return bool
     */
    public function getInsertPrivilege(): bool
    {
        return $this->insertPrivilege;
    }

    /**
     *
     * @return bool
     */
    public function getUpdatePrivilege(): bool
    {
        return $this->updatePrivilege;
    }

    /**
     *
     * @return bool
     */
    public function getDeletePrivilege(): bool
    {
        return $this->deletePrivilege;
    }

    /**
     *
     * @param string $databaseName
     */
    public function setDatabaseName(string $databaseName)
    {
        $this->databaseName = $databaseName;
    }

    /**
     *
     * @param bool $selectPrivilege
     */
    public function setSelectPrivilege(bool $selectPrivilege)
    {
        $this->selectPrivilege = $selectPrivilege;
    }

    /**
     *
     * @param bool $insertPrivilege
     */
    public function setInsertPrivilege(bool $insertPrivilege)
    {
        $this->insertPrivilege = $insertPrivilege;
    }

    /**
     *
     * @param bool $updatePrivilege
     */
    public function setUpdatePrivilege(bool $updatePrivilege)
    {
        $this->updatePrivilege = $updatePrivilege;
    }

    /**
     *
     * @param bool $deletePrivilege
     */
    public function setDeletePrivilege(bool $deletePrivilege)
    {
        $this->deletePrivilege = $deletePrivilege;
    }

    /**
     *
     * {@inheritdoc}
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        $string = "<b>Database:</b> $this->databaseName, <i>select:</i> $this->selectPrivilege, " 
            . "<i>insert:</i> $this->insertPrivilege, <i>update:</i> $this->updatePrivilege, " 
            . "<i>delete:</i> $this->deletePrivilege";
        return $string;
    }
    
}