<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/18/2015
 * Time: 3:42 PM
 */

namespace MVC\Models;


use MVC\BindingModels\Status\StatusBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\StatusViewModel;

class StatusRepository {
    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];

    private static $insertObjectPool = [];

    /**
     * @var StatusRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return StatusRepository
     */
    public static function create(){
        if(self::$inst == null){
            self::$inst = new self();
        }

        return self::$inst;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function filterById(int $id){
        $this->where .=" AND id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function filterByName(string $name){
        $this->where .=" AND name = ?";
        $this->placeholders[] = $name;
        return $this;
    }

    /**
     * @param string $column
     * @return $this
     * @throws \Exception
     */
    public function orderBy(string $column){
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
     * @param string $column
     * @return $this
     * @throws \Exception
     */
    public function orderByDescending(string $column){
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
     * @param string $column
     * @return $this
     * @throws \Exception
     */
    public function thenBy(string $column){
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
     * @param string $column
     * @return $this
     * @throws \Exception
     */
    public function thenByDescending(string $column){
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
     * @return StatusViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "SELECT * FROM conference_status" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $allStatus=[];

        foreach($result->fetchAll() as $statusInfo){
            $status = new StatusViewModel(
                $statusInfo['name'],
                $statusInfo['id']
            );

            $allStatus[] = $status;
            self::$selectedObjectPool[] = $status;
        }

        return $allStatus;
    }

    /**
     * @return StatusViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "SELECT * FROM conference_status" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $statusInfo = $result->fetch();
        $status = new StatusViewModel(
            $statusInfo['name'],
            $statusInfo['id']
        );

        self::$selectedObjectPool[] = $status;

        return $status;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM conference_status" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    public static function add(StatusBindingModel $model){
        if($model->getId()){
            throw new \Exception('This entity is not new');
        }

        if(self::exists($model->getName())){
            throw new \Exception("Status already exists");
        }

        self::$insertObjectPool[] = $model;

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

    /**
     * @param StatusViewModel $model
     * @throws \Exception
     */
    private static function update(StatusViewModel $model){
        $db = Database::getInstance('app');
        $query = "UPDATE conference_status SET name = ? WHERE id = ?";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getName(),
                $model->getId()
            ]
        );
    }

    /**
     * @param StatusBindingModel $model
     * @throws \Exception
     */
    private static function insert(StatusBindingModel $model){

        $db = Database::getInstance('app');
        $query = "INSERT INTO conference_status (name) VALUES (?)";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getName(),
            ]
        );
    }

    /**
     * @param string $name
     * @return bool
     * @throws \Exception
     */
    public function exists(string $name)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id FROM conference_status WHERE name = ?");
        $result->execute([ $name ]);

        return $result->rowCount() > 0;
    }

    /**
     * @param string $column
     * @return bool
     */
    public function isColumnAllowed(string $column){
        $refc = new \ReflectionClass('MVC\BindingModels\Status\StatusBindingModel');
        $consts = $refc->getConstants();

        return in_array($column, $consts);
    }
} 