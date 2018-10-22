<?php

class Privilege implements JsonSerializable
{

    private $privilege;

    public function __construct($privilege)
    {
        $this->setPrivilege($privilege);
    }

    /**
     *
     * @return mixed
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     *
     * @param mixed $privilege
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function __toString()
    {
        $string = "<b>Type:</b> $this->privilege";
        return $string;
    }
    
}