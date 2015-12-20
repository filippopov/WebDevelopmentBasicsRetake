<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/17/2015
 * Time: 3:35 PM
 */

namespace MVC\BindingModels\Comments;


class CommentsBindingModel {

    const AUTHOR_ID = 'c.user_id';
    const DATE_AND_TIME = 'c.date_time';
    const ID = 'c.id';
    const COMMENT ='c.comment_text';

    private $userId;
    private $comment;
    private $dateTime;
    private $id;


    function __construct($comment, $userId, $dateTime,$id=null)
    {
        $this->comment = $comment;
        $this->userId = $userId;
        $this->dateTime = $dateTime;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }



} 