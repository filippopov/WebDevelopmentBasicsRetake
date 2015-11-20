<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/20/2015
 * Time: 5:16 PM
 */

namespace MVC\Models;


use MVC\BindingModels\ConferenceUser\ConferenceUserBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\ConferenceUserViewModel;

class ConferenceUserRepository {

    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];

    private static $insertObjectPool = [];

    /**
     * @var ConferenceUserRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return ConferenceUserRepository
     */
    public static function create(){
        if(self::$inst == null){
            self::$inst = new self();
        }

        return self::$inst;
    }

    public function filterByUserId($id){
        $this->where .=" AND uc.user_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    public function filterByConferenceId($id){
        $this->where .=" AND uc.conference_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    public function deleteFilter($userId,$conferenceId){
        $this->where .=" AND user_id = ? AND conference_id = ?";
        $this->placeholders[] = $userId;
        $this->placeholders[] = $conferenceId;
        return $this;
    }

    /**
     * @return ConferenceUserViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "select c.name, c.time_begin, c.time_end, uc.user_id,uc.conference_id,u.username from conference c
join users_conference uc on c.id = uc.conference_id
join users u on u.id = uc.user_id" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $conferencesUsers=[];

        foreach($result->fetchAll() as $conferenceUser){
            $confUser = new ConferenceUserViewModel(
                $conferenceUser['user_id'],
                $conferenceUser['conference_id'],
                $conferenceUser['time_begin'],
                $conferenceUser['time_end'],
                $conferenceUser['name'],
                $conferenceUser['username']
            );



            $conferencesUsers[] = $confUser;
            self::$selectedObjectPool[] = $confUser;
        }

        return $conferencesUsers;
    }

    /**
     * @return ConferenceUserViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "select c.name,c.time_begin, c.time_end, uc.user_id,uc.conference_id,u.username from conference c
join users_conference uc on c.id = uc.conference_id
join users u on u.id = uc.user_id" . $this->where .$this->order ." LIMIT 1";
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $conferenceUser = $result->fetch();
        $confUser = new ConferenceUserViewModel(
            $conferenceUser['user_id'],
            $conferenceUser['conference_id'],
            $conferenceUser['time_begin'],
            $conferenceUser['time_end'],
            $conferenceUser['name'],
            $conferenceUser['username']
        );

        self::$selectedObjectPool[] = $confUser;

        return $confUser;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM users_conference" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        return $result->rowCount() > 0;
    }

    public static function add(ConferenceUserBindingModel $model){

        self::$insertObjectPool[] = $model;

    }

    public static function save()
    {
        foreach (self::$insertObjectPool as $entity) {
            self::insert($entity);
        }

        return true;
    }


    private static function insert(ConferenceUserBindingModel $model){

        $db = Database::getInstance('app');
        $query = "INSERT INTO users_conference (user_id, conference_id) VALUES (?, ?)";
        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getUserId(),
                $model->getConferenceId()
            ]
        );
    }

} 