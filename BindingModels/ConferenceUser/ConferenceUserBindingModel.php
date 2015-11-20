<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/20/2015
 * Time: 6:22 PM
 */

namespace MVC\BindingModels\ConferenceUser;


class ConferenceUserBindingModel {
    const COL_USER_ID = 'uc.user_id';
    const COL_CONFERENCE_ID = 'uc.conference_id';

    private $userId;
    private $conferenceId;

    function __construct($userId, $conferenceId)
    {
        $this->conferenceId = $conferenceId;
        $this->userId = $userId;
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

} 