<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/20/2015
 * Time: 5:33 PM
 */

namespace MVC\ViewModels;


class ConferenceUserViewModel {
    private $userId;
    private $conferenceId;
    private $userName;
    private $conferenceName;
    private $conferenceStart;
    private $conferenceEnd;

    function __construct($userId, $conferenceId,$conferenceStart=null, $conferenceEnd=null,  $conferenceName=null,   $userName=null)
    {
        $this->setUserId($userId)->setConferenceId($conferenceId)->
        setConferenceStart($conferenceStart)->setConferenceEnd($conferenceEnd)->
        setConferenceName($conferenceName)->setUserName($userName);
    }


    /**
     * @return mixed
     */
    public function getConferenceEnd()
    {
        return $this->conferenceEnd;
    }

    /**
     * @param mixed $conferenceEnd
     */
    public function setConferenceEnd($conferenceEnd)
    {
        $this->conferenceEnd = $conferenceEnd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConferenceStart()
    {
        return $this->conferenceStart;
    }

    /**
     * @param mixed $conferenceStart
     */
    public function setConferenceStart($conferenceStart)
    {
        $this->conferenceStart = $conferenceStart;
        return $this;
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
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
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