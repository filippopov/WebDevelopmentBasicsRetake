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

    /**
     * @param string $username
     * @param string $password
     * @param null $id
     */
    function __construct(string $username, string $password, $id=null)
    {
        $this->id = $id;
        $this->password = $password;
        $this->username = $username;
    }

    /**
     * @return mixed
     */
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
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $value
     */
    public function setUsername(string $value) {
        $this->username = $value;
    }

    /**
     * @return string|string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @param string $value
     */
    public function setPassword(string $value) {
        $this->password = $value;
    }

    /**
     * @return bool
     */
    public function isValid() {
        $validUsername = strlen($this->username) >= 5;
        $validPassword = strlen($this->password) >= 5;
        return $validPassword && $validUsername;
    }
} 