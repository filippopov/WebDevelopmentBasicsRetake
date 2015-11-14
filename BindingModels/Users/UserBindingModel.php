<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/14/2015
 * Time: 9:44 AM
 */

namespace MVC\BindingModels\Users;


class UserBindingModel {
    const COL_USERNAME = 'username';
    const COL_ID = 'id';
    const COL_PASSWORD = 'password';

    private $username;
    private $password;
    private $id;

    function __construct($username, $password, $id=null)
    {
        $this->id = $id;
        $this->password = $password;
        $this->username = $username;
    }


    public function getUsername() {
        return $this->username;
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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($value) {
        $this->username = $value;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($value) {
        $this->password = $value;
    }

    public function isValid() {
        $validUsername = strlen($this->username) >= 5;
        $validPassword = strlen($this->password) >= 5;
        return $validPassword && $validUsername;
    }
} 