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

    function __construct($name, $creatorName,$startTime, $endTime,$numberOfBreaks, $hallsName, $statusName, $id = null )
    {
        $this->setId($id)->
        setName($name)->
        setCreatorName($creatorName)->
        setStartTime($startTime)->
        setEndTime($endTime)->
        setNumberOfBreaks($numberOfBreaks)->
        setHallsName($hallsName)->
        setStatusName($statusName);
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
    private function setEndTime($endTime)
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
    private function setId($id)
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
     * @param mixed $startTime
     */
    private function setStartTime($startTime)
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
     * @param mixed $name
     */
    private function setName($name)
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
     * @param mixed $creatorName
     */
    public function setCreatorName($creatorName)
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
     * @param mixed $hallsName
     */
    public function setHallsName($hallsName)
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
     * @param mixed $numberOfBreaks
     */
    public function setNumberOfBreaks($numberOfBreaks)
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
     * @param mixed $statusName
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;
        return $this;
    }



} 