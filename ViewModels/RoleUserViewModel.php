<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 12:57 PM
 */

namespace MVC\ViewModels;


class RoleUserViewModel {

    private $roleName;
    private $userId;
    private $roleId;
    private $username;

    function __construct($userId, $roleId, $roleName, $username)
    {
        $this->setUserId($userId)->setRoleId($roleId)->setRoleName($roleName)->setUsername($username);
    }


    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param mixed $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * @param mixed $roleName
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }


} 