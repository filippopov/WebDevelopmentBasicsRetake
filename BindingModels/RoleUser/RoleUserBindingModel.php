<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 1:02 PM
 */

namespace MVC\BindingModels\RoleUser;


class RoleUserBindingModel {
    private $userId;
    private $roleId;

    function __construct($userId, $roleId)
    {
        $this->roleId = $roleId;
        $this->userId = $userId;
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
    }


} 