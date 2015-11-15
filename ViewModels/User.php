<?php

namespace MVC\ViewModels;

class User
{
    const COL_USERNAME = 'username';
    const COL_ID = 'id';
    const COL_PASSWORD = 'password';

    private $id;
    private $user;
    private $pass;

    public function __construct($user, $pass,$id = null)
    {
        $this->setId($id)
            ->setUsername($user)
            ->setPass($pass);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    private function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return $this
     */
    public function setUsername($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     * @return $this
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }



}