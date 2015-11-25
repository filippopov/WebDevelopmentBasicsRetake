<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 12:53 PM
 */

namespace MVC\Controllers;


use MVC\BindingModels\RoleUser\RoleUserBindingModel;
use MVC\Models\RoleUserRepository;

class RoleUserController extends Controller {

    /**
     * @param int $userId
     * @param int $roleId
     * @Authorization()
     */
    public function makeUserAdmin(int $userId,int $roleId){
        $model = new RoleUserBindingModel($userId,$roleId);
        RoleUserRepository::create()->add($model);
        RoleUserRepository::save();
    }

    /**
     * @param int $userId
     * @param int $roleId
     * @Authorization()
     */
    public function makeAdminUser(int $userId,int $roleId){
        RoleUserRepository::create()->deleteFilter($userId,$roleId)->delete();
    }

    /**
     * @ROUTE(rol/user)
     */
    public function proba(){
        echo "test roleUser";
    }
} 