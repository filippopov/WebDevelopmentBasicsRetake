<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/17/2015
 * Time: 3:33 PM
 */

namespace MVC\Models;


use MVC\BindingModels\Comments\CommentsBindingModel;
use MVC\Core\Database;
use MVC\ViewModels\CommentViewModel;

class CommentsRepository {
    private $query;

    private $where = " WHERE 1 ";

    private $placeholders = [];

    private $order = '';

    private static $selectedObjectPool = [];
    private static $insertObjectPool = [];

    /**
     * @var CommentsRepository
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return CommentsRepository
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
        $this->where .=" AND c.id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function deleteFilterById($id){
        $this->where .=" AND id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param $username
     * @return $this
     */
    public function filterByAuthorId($id){
        $this->where .=" AND c.user_id = ?";
        $this->placeholders[] = $id;
        return $this;
    }

    /**
     * @param $password
     * @return $this
     */
    public function filterByDateAndTime($dateAndTime){
        $this->where .=" AND c.date_time = ?";
        $this->placeholders[] = $dateAndTime;
        return $this;
    }

    public function filterByAuthorName($username){
        $this->where .=" AND u.username = ?";
        $this->placeholders[] = $username;
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
     * @return CommentViewModel[]
     * @throws \Exception
     */
    public function findAll(){
        $db = Database::getInstance('app');

        $this->query = "SELECT c.id,c.comment_text,c.date_time,u.username,c.user_id FROM comments c JOIN users u ON c.user_id = u.id" . $this->where . $this->order;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);

        $comments=[];

        foreach($result->fetchAll() as $commentInfo){
            $comment = new CommentViewModel(
                $commentInfo['id'],
                $commentInfo['comment_text'],
                $commentInfo['date_time'],
                $commentInfo['username'],
                $commentInfo['user_id']
            );

            $comments[] = $comment;
            self::$selectedObjectPool[] = $comment;
        }

        return $comments;
    }

    /**
     * @return CommentViewModel
     * @throws \Exception
     */
    public function findOne(){
        $db = Database::getInstance('app');

        $this->query = "SELECT c.id,c.comment_text,c.date_time,u.username,c.user_id FROM comments c JOIN users u ON c.user_id = u.id" . $this->where .$this->order ." LIMIT 1";

        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        $commentInfo = $result->fetch();
        $comment = new CommentViewModel(
            $commentInfo['id'],
            $commentInfo['comment_text'],
            $commentInfo['date_time'],
            $commentInfo['username'],
            $commentInfo['user_id']
        );

        self::$selectedObjectPool[] = $comment;

        return $comment;
    }



    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(){
        $db = Database::getInstance('app');

        $this->query = "DELETE FROM comments" . $this->where;
        $result = $db->prepare($this->query);
        $result->execute($this->placeholders);
        var_dump($result);
        return $result->rowCount() > 0;
    }

    /**
     * @param CommentsBindingModel $model
     */
    public static function add(CommentsBindingModel $model){
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
     * @param CommentViewModel $model
     * @throws \Exception
     */
    private static function update(CommentViewModel $model){
        $db = Database::getInstance('app');
        $query = "UPDATE comments SET comment_text = ?, date_time = ? WHERE id = ?";
        $result = $db->prepare($query);

        $result->execute(
            [
                $model->getComment(),
                $model->getDateTime(),
                $model->getId()
            ]
        );
    }

    public function findAllWithPaging($page){
        $db = Database::getInstance('app');

        $this->query = "SELECT c.id,c.comment_text,c.date_time,u.username,c.user_id FROM comments c JOIN users u ON c.user_id = u.id ORDER BY c.date_time DESC LIMIT 5 OFFSET $page";
        $result = $db->prepare($this->query);
        $result->execute();

        $comments=[];

        foreach($result->fetchAll() as $commentInfo){
            $comment = new CommentViewModel(
                $commentInfo['id'],
                $commentInfo['comment_text'],
                $commentInfo['date_time'],
                $commentInfo['username'],
                $commentInfo['user_id']
            );
            $comments[] = $comment;
        }
        return $comments;
    }

    public function counter(){
        $db = Database::getInstance('app');

        $this->query = "SELECT count(*) as count FROM comments";
        $result = $db->prepare($this->query);
        $result->execute();

        $count = $result->fetch();

        return $count;
    }

    /**
     * @param CommentsBindingModel $model
     * @throws \Exception
     */
    private static function insert(CommentsBindingModel $model){

        $db = Database::getInstance('app');
        $query = "INSERT INTO comments (comment_text, user_id, date_time) VALUES (?, ?, ?)";

        $result = $db->prepare($query);
        $result->execute(
            [
                $model->getComment(),
                $model->getUserId(),
                $model->getDateTime()
            ]
        );


    }

    /**
     * @param $column
     * @return bool
     */
    private function isColumnAllowed($column){
        $refc = new \ReflectionClass('MVC\BindingModels\Comments\CommentsBindingModel');
        $consts = $refc->getConstants();

        return in_array($column, $consts);
    }


} 