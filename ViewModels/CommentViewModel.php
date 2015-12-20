<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 12/17/2015
 * Time: 3:38 PM
 */

namespace MVC\ViewModels;


class CommentViewModel {

    private $id;
    private $userId;
    private $comment;
    private $dateTime;
    private $authorName;

    function __construct($id, $comment, $dateTime,$authorName ,$userId)
    {
        $this->setId($id)
            ->setComment($comment)
            ->setDateTime($dateTime)
            ->setUserId($userId)
            ->setAuthorName($authorName);
    }


    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
        return $this;
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
        return $this;
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
        return $this;
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
        return $this;
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
        return $this;
    }


} 