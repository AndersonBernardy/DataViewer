<?php

class Permission implements JsonSerializable
{

    private $dbname;
    private $selectPrivilege;
    private $insertPrivilege;
    private $updatePrivilege;
    private $deletePrivilege;

    /**
     *
     * @param string $dbname
     * @param bool $selectPrivilege
     * @param bool $insertPrivilege
     * @param bool $updatePrivilege
     * @param bool $deletePrivilege
     */
    public function __construct(string $dbname, bool $selectPrivilege, 
        bool $insertPrivilege, bool $updatePrivilege, bool $deletePrivilege)
    {
        $this->setDbname($dbname);
        $this->setSelectPrivilege($selectPrivilege);
        $this->setInsertPrivilege($insertPrivilege);
        $this->setUpdatePrivilege($updatePrivilege);
        $this->setDeletePrivilege($deletePrivilege);
    }

    /**
     *
     * @return string
     */
    public function getDbname(): string
    {
        return $this->dbname;
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
    private function setDbname(string $dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     *
     * @param bool $selectPrivilege
     */
    private function setSelectPrivilege(bool $selectPrivilege)
    {
        $this->selectPrivilege = $selectPrivilege;
    }

    /**
     *
     * @param bool $insertPrivilege
     */
    private function setInsertPrivilege(bool $insertPrivilege)
    {
        $this->insertPrivilege = $insertPrivilege;
    }

    /**
     *
     * @param bool $updatePrivilege
     */
    private function setUpdatePrivilege(bool $updatePrivilege)
    {
        $this->updatePrivilege = $updatePrivilege;
    }

    /**
     *
     * @param bool $deletePrivilege
     */
    private function setDeletePrivilege(bool $deletePrivilege)
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
        $string = "<b>Database:</b> $this->dbname, <i>select:</i> $this->selectPrivilege, " 
            . "<i>insert:</i> $this->insertPrivilege, <i>update:</i> $this->updatePrivilege, " 
            . "<i>delete:</i> $this->deletePrivilege";
        return $string;
    }
}