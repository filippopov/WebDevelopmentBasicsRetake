<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/17/2015
 * Time: 10:30 AM
 */

namespace MVC\Models;


use MVC\BindingModels\Conference\ConferenceBindingModels;
use MVC\Core\Database;
use MVC\ViewModels\ConferenceViewModel;

class ConferenceRepository {

    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];

    private static $insertObjectPool = [];

    /**
     * @var ConferenceRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return ConferenceRepository
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
        $this->where .=" AND c.id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function filterByIdForDelete(int $id){
        $this->where .=" AND id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function filterByName(string $name){
        $this->where .=" AND c.name = ?";
        $this->placeholders[] = $name;
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function filterByNameForDelete(string $name){
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
     * @return ConferenceViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "select c.id,c.name,c.time_begin, c.time_end, c.number_of_breaks,c.creator_id, u.username as creator_name, h.name as halls_name, cs.name as status_name from conference c
left join users u on u.id = c.creator_id
left join halls h on c.halls_id = h.id
left join conference_status cs on cs.id = c.status_id" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $conferences=[];

        foreach($result->fetchAll() as $conferenceInfo){
            $conference = new ConferenceViewModel(
                $conferenceInfo['name'],
                $conferenceInfo['creator_name'],
                $conferenceInfo['time_begin'],
                $conferenceInfo['time_end'],
                $conferenceInfo['number_of_breaks'],
                $conferenceInfo['halls_name'],
                $conferenceInfo['status_name'],
                $conferenceInfo['id'],
                $conferenceInfo['creator_id']
            );

            $conferences[] = $conference;
            self::$selectedObjectPool[] = $conference;
        }

        return $conferences;
    }

    public function findAllWithPaging($page){
        $db = Database::getInstance('app');

        $this->query = "select c.id,c.name,c.time_begin, c.time_end, c.number_of_breaks,c.creator_id, u.username as creator_name, h.name as halls_name, cs.name as status_name from conference c
left join users u on u.id = c.creator_id
left join halls h on c.halls_id = h.id
left join conference_status cs on cs.id = c.status_id ORDER BY c.id DESC LIMIT 5 OFFSET $page";
        $result = $db->prepare($this->query);
        $result->execute();

        $conferences=[];

        foreach($result->fetchAll() as $conferenceInfo){
            $conference = new ConferenceViewModel(
                $conferenceInfo['name'],
                $conferenceInfo['creator_name'],
                $conferenceInfo['time_begin'],
                $conferenceInfo['time_end'],
                $conferenceInfo['number_of_breaks'],
                $conferenceInfo['halls_name'],
                $conferenceInfo['status_name'],
                $conferenceInfo['id'],
                $conferenceInfo['creator_id']
            );

            $conferences[] = $conference;
        }

        return $conferences;
    }

    public function counter(){
        $db = Database::getInstance('app');

        $this->query = "SELECT count(*) as count FROM conference";
        $result = $db->prepare($this->query);
        $result->execute();

        $count = $result->fetch();

        return $count;
    }

    /**
     * @return ConferenceViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "select c.id,c.name,c.time_begin, c.time_end, c.number_of_breaks, c.creator_id, u.username as creator_name, h.name as halls_name, cs.name as status_name from conference c
left join users u on u.id = c.creator_id
left join halls h on c.halls_id = h.id
left join conference_status cs on cs.id = c.status_id" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $conferenceInfo = $result->fetch();
        $conference = new ConferenceViewModel(
            $conferenceInfo['name'],
            $conferenceInfo['creator_name'],
            $conferenceInfo['time_begin'],
            $conferenceInfo['time_end'],
            $conferenceInfo['number_of_breaks'],
            $conferenceInfo['halls_name'],
            $conferenceInfo['status_name'],
            $conferenceInfo['id'],
            $conferenceInfo['creator_id']
        );

        self::$selectedObjectPool[] = $conference;

        return $conference;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM conference" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    public static function add(ConferenceBindingModels $conference){
        if($conference->getId()){
            throw new \Exception('This entity is not new');
        }

        if(self::exists($conference->getName())){
            throw new \Exception("Conference already exists");
        }

        self::$insertObjectPool[] = $conference;

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

    private static function update(ConferenceViewModel $model){
        $db = Database::getInstance('app');
        $query = "UPDATE conference SET name = ?, time_begin = ?, time_end = ?, number_of_breaks = ?, halls_id = ?, status_id = ? WHERE id = ?";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getName(),
                $model->getStartTime(),
                $model->getEndTime(),
                $model->getNumberOfBreaks(),
                $model->getHallsName(),
                $model->getStatusName(),
                $model->getId()
            ]
        );
    }

    /**
     * @param ConferenceBindingModels $conference
     * @throws \Exception
     */
    private static function insert(ConferenceBindingModels $conference){

        $db = Database::getInstance('app');
        $query = "INSERT INTO conference (name, creator_id, halls_id, time_begin, time_end, number_of_breaks, status_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $result = $db->prepare($query);
        $result->execute(
            [
                $conference->getName(),
                $conference->getCreatorId(),
                $conference->getHallsId(),
                $conference->getStartTime(),
                $conference->getEndTime(),
                $conference->getBreaks(),
                $conference->getStatusId()
            ]
        );
    }

    /**
     * @param $name
     * @return bool
     * @throws \Exception
     */
    public function exists($name)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id FROM conference WHERE name = ?");
        $result->execute([ $name ]);

        return $result->rowCount() > 0;
    }

    /**
     * @param string $column
     * @return bool
     */
    private function isColumnAllowed(string $column){
        $refc = new \ReflectionClass('MVC\BindingModels\Users\UserBindingModel');
        $consts = $refc->getConstants();

        return in_array($column, $consts);
    }
} 