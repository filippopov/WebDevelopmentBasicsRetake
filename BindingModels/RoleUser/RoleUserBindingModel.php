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

    /**
     * @param int $userId
     * @param int $roleId
     */
    function __construct(int $userId,int $roleId)
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
     * @param int $roleId
     */
    public function setRoleId(int $roleId)
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
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }


} 