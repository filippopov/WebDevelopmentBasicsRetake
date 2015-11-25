<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 10:06 AM
 */

namespace MVC\Models;


use MVC\BindingModels\LectorConference\LectorConferenceBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\LectorConferenceViewModel;

class LectorConferenceRepository {
    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];

    private static $insertObjectPool = [];

    /**
     * @var LectorConferenceRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return LectorConferenceRepository
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
    public function filterByLectorId(int $id){
        $this->where .=" AND lc.lector_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function filterByConferenceId(int $id){
        $this->where .=" AND lc.conference_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param int $lectorId
     * @param int $conferenceId
     * @return $this
     */
    public function deleteFilter(int $lectorId,int $conferenceId){
        $this->where .=" AND lector_id = ? AND conference_id = ?";
        $this->placeholders[] = $lectorId;
        $this->placeholders[] = $conferenceId;
        return $this;
    }

    /**
     * @return LectorConferenceViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "SELECT c.name,lc.lector_id,lc.conference_id,u.username FROM conference c
join lector_conference lc on c.id = lc.conference_id
join users u on u.id = lc.lector_id" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $lectorsConferences=[];

        foreach($result->fetchAll() as $lectorConf){
            $lectConf = new LectorConferenceViewModel(
                $lectorConf['username'],
                $lectorConf['name'],
                $lectorConf['conference_id'],
                $lectorConf['lector_id']
            );



            $lectorsConferences[] = $lectConf;
            self::$selectedObjectPool[] = $lectConf;
        }

        return $lectorsConferences;
    }

    /**
     * @return LectorConferenceViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "SELECT c.name,lc.lector_id,lc.conference_id,u.username FROM conference c
join lector_conference lc on c.id = lc.conference_id
join users u on u.id = lc.lector_id" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $lectorConf = $result->fetch();
        $lectConf = new LectorConferenceViewModel(
            $lectorConf['username'],
            $lectorConf['name'],
            $lectorConf['conference_id'],
            $lectorConf['lector_id']
        );

        self::$selectedObjectPool[] = $lectConf;

        return $lectConf;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM lector_conference" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    public static function add(LectorConferenceBindingModel $model){

        self::$insertObjectPool[] = $model;

    }

    public static function save()
    {
        foreach (self::$insertObjectPool as $entity) {
            self::insert($entity);
        }

        return true;
    }

    /**
     * @param LectorConferenceBindingModel $model
     * @throws \Exception
     */
    private static function insert(LectorConferenceBindingModel $model){

        $db = Database::getInstance('app');
        $query = "INSERT INTO lector_conference (lector_id, conference_id) VALUES (?, ?)";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getLectorId(),
                $model->getConferenceId()
            ]
        );
    }
} 