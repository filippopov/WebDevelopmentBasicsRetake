<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/17/2015
 * Time: 12:00 PM
 */

namespace MVC\BindingModels\Conference;


class ConferenceBindingModels {
    const COL_NAME = 'name';
    const COL_ID = 'id';
    const START_TIME = 'time_begin';
    const END_TIME = 'time_end';


    private $id;
    private $name;
    private $creatorId;
    private $startTime;
    private $endTime;
    private $breaks;
    private $hallsId;
    private $statusId;

    function __construct($name,$creatorId,$startTime,$endTime,$breaks,$hallsId, $statusId,$id=null)
    {
        $this->breaks = $breaks;
        $this->statusId = $statusId;
        $this->startTime = $startTime;
        $this->name = $name;
        $this->id = $id;
        $this->hallsId = $hallsId;
        $this->endTime = $endTime;
        $this->creatorId = $creatorId;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param mixed $statusId
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getHallsId()
    {
        return $this->hallsId;
    }

    /**
     * @param mixed $hallsId
     */
    public function setHallsId($hallsId)
    {
        $this->hallsId = $hallsId;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getBreaks()
    {
        return $this->breaks;
    }

    /**
     * @param mixed $breaks
     */
    public function setBreaks($breaks)
    {
        $this->breaks = $breaks;
    }

    /**
     * @return mixed
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @param mixed $creatorId
     */
    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }




} 