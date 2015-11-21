<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/13/2015
 * Time: 5:06 PM
 */
namespace MVC\Models;

use MVC\BindingModels\Users\UserBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\User;

class IdentityUser {

    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];
    private static $insertObjectPool = [];
    /**
     * @var IdentityUser
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return IdentityUser
     */
    public static function create(){
        if(self::$inst == null){
            self::$inst = new self();
        }

        return self::$inst;
    }

    /**
     * @param $id
     * @return $this
     */
    public function filterById($id){
        $this->where .=" AND id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param $username
     * @return $this
     */
    public function filterByUsername($username){
        $this->where .=" AND username = ?";
        $this->placeholders[] = $username;
        return $this;
    }

    /**
     * @param $password
     * @return $this
     */
    public function filterByPassword($password){
        $this->where .=" AND password = ?";
        $this->placeholders[] = $password;
        return $this;
    }

    /**
     * @param $column
     * @return $this
     * @throws \Exception
     */
    public function orderBy($column){
        if(!$this->isColumnAllowed($column)){
            throw new \Exception("Column not found");
        }
        if(!empty($this->order)){
            throw new \Exception("Cannot do primary order, because you have a primary order");
        }
        $this->order .= " ORDER BY $column";

        return $this;
    }

    /**
     * @param $column
     * @return $this
     * @throws \Exception
     */
    public function orderByDescending($column){
        if(!$this->isColumnAllowed($column)){
            throw new \Exception("Column not found");
        }

        if(!empty($this->order)){
            throw new \Exception("Cannot do primary order, because you have a primary order");
        }

        $this->order .= " ORDER BY $column DESC";

        return $this;
    }

    /**
     * @param $column
     * @return $this
     * @throws \Exception
     */
    public function thenBy($column){
        if(empty($this->order)){
            throw new \Exception("Cannot do secondary order, because you don't have a primary order");
        }

        if(!$this->isColumnAllowed($column)){
            throw new \Exception("Column not found");
        }

        $this->order .=", $column ASC";

        return $this;
    }

    /**
     * @param $column
     * @return $this
     * @throws \Exception
     */
    public function thenByDescending($column){
        if(empty($this->order)){
            throw new \Exception("Cannot do secondary order, because you don't have a primary order");
        }
        if(!$this->isColumnAllowed($column)){
            throw new \Exception("Column not found");
        }
        $this->order .=", $column DESC";

        return $this;
    }

    /**
     * @return User[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "SELECT * FROM users" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $users=[];

        foreach($result->fetchAll() as $userInfo){
            $user = new User(
                $userInfo['username'],
                $userInfo['password'],
                $userInfo['id']
            );

            $users[] = $user;
            self::$selectedObjectPool[] = $user;
        }

        return $users;
    }

    /**
     * @return User
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "SELECT * FROM users" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $userInfo = $result->fetch();
        $user = new User(
            $userInfo['username'],
            $userInfo['password'],
            $userInfo['id']);

        self::$selectedObjectPool[] = $user;

        return $user;
    }



    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM users" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    public function insertAdmin($userId, $roleId){
        $db = Database::getInstance('app');

        $this->query = "INSERT INTO users_roles (user_id, role_id) VALUES (?, ?)";
        $result = $db->prepare($this->query);
        $result->execute(
            [
                $userId,
                $roleId
            ]
        );

        return $result->rowCount() > 0;
    }

    public function login(UserBindingModel $model)
    {
        $db = Database::getInstance('app');
        $this->where .=" AND username = ?";
        $this->placeholders[] = $model->getUsername();
        $this->query = "SELECT id, username, password FROM users". $this->where;
        $result =$db->prepare($this->query);
        $result->execute($this->placeholders);

        if ($result->rowCount() <= 0) {
            throw new \Exception('Invalid username');
        }

        $userRow = $result->fetch();

        if (password_verify($model->getPassword(), $userRow['password'])) {
            return $userRow['id'];
        }

        throw new \Exception('Invalid credentials');
    }

    public static function add(UserBindingModel $user){
        if($user->getId()){
            throw new \Exception('This entity is not new');
        }

        if(self::exists($user->getUsername())){
            throw new \Exception("User already registered");
        }

        self::$insertObjectPool[] = $user;

    }

    public static function save()
    {
        foreach (self::$selectedObjectPool as $entity) {
            self::update($entity);
        }

        foreach (self::$insertObjectPool as $entity) {
            self::insert($entity);
        }

        return true;
    }

    private static function update(User $user){
        $db = Database::getInstance('app');
        $query = "UPDATE users SET username = ?, password = ? WHERE id = ?";
        $result = $db->prepare($query);
        $result->execute(
            [
            $user->getUsername(),
            password_hash($user->getPass(), PASSWORD_DEFAULT),
            $user->getId()
            ]
        );
    }

    private static function insert(UserBindingModel $user){

        $db = Database::getInstance('app');
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $result = $db->prepare($query);
        $result->execute(
            [
            $user->getUsername(),
            password_hash($user->getPassword(), PASSWORD_DEFAULT)
            ]
        );
    }

    private function isColumnAllowed($column){
        $refc = new \ReflectionClass('MVC\BindingModels\Users\UserBindingModel');
        $consts = $refc->getConstants();

        return in_array($column, $consts);
    }

    public function exists($username)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id FROM users WHERE username = ?");
        $result->execute([ $username ]);

        return $result->rowCount() > 0;
    }

    public function inRole($userId){
        $db = Database::getInstance('app');

        $result = $db->prepare("Select r.name from users u left join users_roles ur on u.id = ur.user_id left join roles r on ur.role_id = r.id where u.id = ?");
        $result->execute([$userId]);

        return $result->fetch();
    }
} 