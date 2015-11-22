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

    public function makeUserAdmin($userId,$roleId){
        $model = new RoleUserBindingModel($userId,$roleId);
        RoleUserRepository::create()->add($model);
        RoleUserRepository::save();
    }

    public function makeAdminUser($userId,$roleId){
        RoleUserRepository::create()->deleteFilter($userId,$roleId)->delete();
    }
} 