<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/17/2015
 * Time: 9:51 PM
 */

namespace MVC\Models;


use MVC\BindingModels\Halls\HallsBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\HallsViewModel;

class HallsRepository {

    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];

    private static $insertObjectPool = [];

    /**
     * @var HallsRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return HallsRepository
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
     * @return HallsViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "SELECT * FROM halls" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $halls=[];

        foreach($result->fetchAll() as $hallInfo){
            $hall = new HallsViewModel(
                $hallInfo['name'],
                $hallInfo['capacity'],
                $hallInfo['id']
            );

            $halls[] = $hall;
            self::$selectedObjectPool[] = $hall;
        }

        return $halls;
    }

    /**
     * @return HallsViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "SELECT * FROM halls" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $hallInfo = $result->fetch();
        $hall = new HallsViewModel(
            $hallInfo['name'],
            $hallInfo['capacity'],
            $hallInfo['id']
        );

        self::$selectedObjectPool[] = $hall;

        return $hall;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM halls" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    /**
     * @param HallsBindingModel $halls
     * @throws \Exception
     */
    public static function add(HallsBindingModel $halls){
        if($halls->getId()){
            throw new \Exception('This entity is not new');
        }

        if(self::exists($halls->getName())){
            throw new \Exception("Hall already exists");
        }

        self::$insertObjectPool[] = $halls;

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
     * @param HallsViewModel $model
     * @throws \Exception
     */
    private static function update(HallsViewModel $model){
        $db = Database::getInstance('app');
        $query = "UPDATE halls SET name = ?, capacity = ? WHERE id = ?";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getName(),
                $model->getCapacity(),
                $model->getId()
            ]
        );
    }

    /**
     * @param HallsBindingModel $model
     * @throws \Exception
     */
    private static function insert(HallsBindingModel $model){

        $db = Database::getInstance('app');
        $query = "INSERT INTO halls (name, capacity) VALUES (?, ?)";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getName(),
                $model->getCapacity()
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

        $result = $db->prepare("SELECT id FROM halls WHERE name = ?");
        $result->execute([ $name ]);

        return $result->rowCount() > 0;
    }

    /**
     * @param string $column
     * @return bool
     */
    public function isColumnAllowed(string $column){
        $refc = new \ReflectionClass('MVC\BindingModels\Halls\HallsBindingModel');
        $consts = $refc->getConstants();

        return in_array($column, $consts);
    }
} 