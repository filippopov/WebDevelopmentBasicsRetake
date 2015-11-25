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

    /**
     * @param string $lectorName
     * @param string $conferenceName
     * @param string $conferenceId
     * @param string $lectorId
     */
    function __construct(string $lectorName,string $conferenceName, string $conferenceId,string $lectorId)
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
     * @param string $conferenceId
     * @return $this
     */
    public function setConferenceId(string $conferenceId)
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
     * @param string $lectorName
     * @return $this
     */
    public function setLectorName(string $lectorName)
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
     * @param string $lectorId
     * @return $this
     */
    public function setLectorId(string $lectorId)
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
     * @param string $conferenceName
     * @return $this
     */
    public function setConferenceName(string $conferenceName)
    {
        $this->conferenceName = $conferenceName;
        return $this;
    }







} 