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

    /**
     * @param string $name
     * @param int $creatorId
     * @param string $startTime
     * @param string $endTime
     * @param int $breaks
     * @param int $hallsId
     * @param int $statusId
     * @param null $id
     */
    function __construct(string $name,int $creatorId,string $startTime,string $endTime,int $breaks,int $hallsId,int $statusId, $id=null)
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
     * @param int $statusId
     */
    public function setStatusId(int $statusId)
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
     * @param string $startTime
     */
    public function setStartTime(string $startTime)
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
     * @param string $name
     */
    public function setName(string $name)
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
     * @param $id
     */
    public function setId( $id)
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
     * @param int $hallsId
     */
    public function setHallsId(int $hallsId)
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
     * @param string $endTime
     */
    public function setEndTime(string $endTime)
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
     * @param int $breaks
     */
    public function setBreaks(int $breaks)
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
     * @param int $creatorId
     */
    public function setCreatorId(int $creatorId)
    {
        $this->creatorId = $creatorId;
    }




} 