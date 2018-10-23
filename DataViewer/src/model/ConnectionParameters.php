<?php

class ConnectionParameters {
    
    private $servertype;
    private $host;
    private $port;
    private $dbname;
    private $charset;
    private $username;
    private $password;
    
    public function __construct(string $servertype, string $host, int $port, string $dbname,
        string $charset, string $username, string $password){
        $this->setServertype($servertype);
        $this->setHost($host);
        $this->setPort($port);
        $this->setDbname($dbname);
        $this->setCharset($charset);
        $this->setUsername($username);
        $this->setPassword($password);
    }
    
    /**
     * @return string
     */
    public function getServertype(): string
    {
        return $this->servertype;
    }

    /**
     * @return string
     */
    public function getHost():string
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->dbname;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $servertype
     */
    private function setServertype(string $servertype)
    {
        $this->servertype = $servertype;
    }

    /**
     * @param string $host
     */
    private function setHost(string $host)
    {
        $this->host = $host;
    }

    /**
     * @param int $port
     */
    private function setPort(int $port)
    {
        $this->port = $port;
    }

    /**
     * @param string $dbname
     */
    private function setDbname(string $dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @param string $charset
     */
    private function setCharset(string $charset)
    {
        $this->charset = $charset;
    }

    /**
     * @param string $username
     */
    private function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    private function setPassword(string $password)
    {
        $this->password = $password;
    }

}