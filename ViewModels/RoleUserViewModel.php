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

    /**
     * @param string $userId
     * @param string $roleId
     * @param string $roleName
     * @param string $username
     */
    function __construct(string $userId,string $roleId,string $roleName,string $username)
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
     * @param string $roleId
     * @return $this
     */
    public function setRoleId(string $roleId)
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
     * @param string $roleName
     * @return $this
     */
    public function setRoleName(string $roleName)
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
     * @param string $userId
     * @return $this
     */
    public function setUserId(string $userId)
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
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }


} 