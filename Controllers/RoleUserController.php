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
     * @param $userId
     * @param $roleId
     * @Authorization()
     */
    public function makeUserAdmin($userId,$roleId){
        $model = new RoleUserBindingModel($userId,$roleId);
        RoleUserRepository::create()->add($model);
        RoleUserRepository::save();
    }

    /**
     * @param $userId
     * @param $roleId
     * @Authorization()
     */
    public function makeAdminUser($userId,$roleId){
        RoleUserRepository::create()->deleteFilter($userId,$roleId)->delete();
    }

    /**
     * @ROUTE(rol/user)
     */
    public function proba(){
        echo "test roleUser";
    }
} 