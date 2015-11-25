<?php

namespace MVC\Core\Drivers;

abstract class DriverAbstract
{
    protected $user;
    protected $pass;
    protected $dbName;
    protected $host;

    /**
     * @param string $user
     * @param string $pass
     * @param string $dbName
     * @param null $host
     */
    public function __construct(string $user,string $pass,string $dbName, $host = null)
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->host = $host;
    }

    /**
     * @return string
     */
    public abstract function getDsn();
}