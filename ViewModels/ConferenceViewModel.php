<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/17/2015
 * Time: 11:12 AM
 */

namespace MVC\ViewModels;


class ConferenceViewModel {
    private $id;
    private $name;
    private $startTime;
    private $endTime;
    private $numberOfBreaks;
    private $creatorName;
    private $hallsName;
    private $statusName;
    private $creatorId;

    /**
     * @param string $name
     * @param string $creatorName
     * @param string $startTime
     * @param string $endTime
     * @param int $numberOfBreaks
     * @param string $hallsName
     * @param string $statusName
     * @param null $id
     * @param null $creatorId
     */
    function __construct(string $name,string $creatorName,string $startTime,string $endTime, int $numberOfBreaks,string $hallsName,string $statusName, $id = null, $creatorId = null )
    {
        $this->setId($id)->
        setName($name)->
        setCreatorName($creatorName)->
        setStartTime($startTime)->
        setEndTime($endTime)->
        setNumberOfBreaks($numberOfBreaks)->
        setHallsName($hallsName)->
        setStatusName($statusName)->setCreatorId($creatorId);
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
        return $this;
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
     * @return $this
     */
    public function setEndTime(string $endTime)
    {
        $this->endTime = $endTime;
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
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     * @return $this
     */
    public function setStartTime(string $startTime)
    {
        $this->startTime = $startTime;
        return $this;
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
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCreatorName()
    {
        return $this->creatorName;
    }

    /**
     * @param string $creatorName
     * @return $this
     */
    public function setCreatorName(string $creatorName)
    {
        $this->creatorName = $creatorName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHallsName()
    {
        return $this->hallsName;
    }

    /**
     * @param string $hallsName
     * @return $this
     */
    public function setHallsName(string $hallsName)
    {
        $this->hallsName = $hallsName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberOfBreaks()
    {
        return $this->numberOfBreaks;
    }

    /**
     * @param int $numberOfBreaks
     * @return $this
     */
    public function setNumberOfBreaks(int $numberOfBreaks)
    {
        $this->numberOfBreaks = $numberOfBreaks;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * @param string $statusName
     * @return $this
     */
    public function setStatusName(string $statusName)
    {
        $this->statusName = $statusName;
        return $this;
    }



} 