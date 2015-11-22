<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 12:54 PM
 */

namespace MVC\Models;


use MVC\BindingModels\RoleUser\RoleUserBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\RoleUserViewModel;

class RoleUserRepository {
    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];

    private static $insertObjectPool = [];

    /**
     * @var RoleUserRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return RoleUserRepository
     */
    public static function create(){
        if(self::$inst == null){
            self::$inst = new self();
        }

        return self::$inst;
    }

    public function filterByUserId($id){
        $this->where .=" AND ur.user_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    public function filterByRoleId($id){
        $this->where .=" AND ur.role_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    public function deleteFilter($userId,$roleId){
        $this->where .=" AND user_id = ? AND role_id = ?";
        $this->placeholders[] = $userId;
        $this->placeholders[] = $roleId;
        return $this;
    }

    /**
     * @return RoleUserViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "SELECT r.name, ur.user_id, ur.role_id,u.username FROM roles r
join users_roles ur on r.id = ur.role_id
join users u on u.id = ur.user_id" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $roleUsers=[];

        foreach($result->fetchAll() as $roleUser){
            $roUser = new RoleUserViewModel(
                $roleUser['user_id'],
                $roleUser['role_id'],
                $roleUser['name'],
                $roleUser['username']
            );



            $roleUsers[] = $roUser;
            self::$selectedObjectPool[] = $roUser;
        }

        return $roleUsers;
    }

    /**
     * @return RoleUserViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "SELECT r.name, ur.user_id, ur.role_id,u.username FROM roles r
join users_roles ur on r.id = ur.role_id
join users u on u.id = ur.user_id" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $roleUser = $result->fetch();
        $roUser = new RoleUserViewModel(
            $roleUser['user_id'],
            $roleUser['role_id'],
            $roleUser['name'],
            $roleUser['username']
        );

        self::$selectedObjectPool[] = $roUser;

        return $roUser;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM users_roles" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    public static function add(RoleUserBindingModel $model){

        self::$insertObjectPool[] = $model;

    }

    public static function save()
    {
        foreach (self::$insertObjectPool as $entity) {
            self::insert($entity);
        }

        return true;
    }


    private static function insert(RoleUserBindingModel $model){

        $db = Database::getInstance('app');
        $query = "INSERT INTO users_roles (user_id, role_id) VALUES (?, ?)";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getUserId(),
                $model->getRoleId()
            ]
        );
    }
} 