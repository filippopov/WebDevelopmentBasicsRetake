<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 10:13 AM
 */

namespace MVC\ViewModels;


class LectorConferenceViewModel {

    private $lectorId;
    private $conferenceId;
    private $lectorName;
    private $conferenceName;

    function __construct($lectorName, $conferenceName, $conferenceId, $lectorId)
    {
        $this->setLectorName($lectorName)->setConferenceName($conferenceName)->setConferenceId($conferenceId)->setLectorId($lectorId);
    }


    /**
     * @return mixed
     */
    public function getConferenceId()
    {
        return $this->conferenceId;
    }

    /**
     * @param mixed $conferenceId
     */
    public function setConferenceId($conferenceId)
    {
        $this->conferenceId = $conferenceId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLectorName()
    {
        return $this->lectorName;
    }

    /**
     * @param mixed $lectorName
     */
    public function setLectorName($lectorName)
    {
        $this->lectorName = $lectorName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLectorId()
    {
        return $this->lectorId;
    }

    /**
     * @param mixed $lectorId
     */
    public function setLectorId($lectorId)
    {
        $this->lectorId = $lectorId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConferenceName()
    {
        return $this->conferenceName;
    }

    /**
     * @param mixed $conferenceName
     */
    public function setConferenceName($conferenceName)
    {
        $this->conferenceName = $conferenceName;
        return $this;
    }







} 