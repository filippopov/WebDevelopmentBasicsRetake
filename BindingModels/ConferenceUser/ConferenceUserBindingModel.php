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

    /**
     * @param int $userId
     * @param int $conferenceId
     */
    function __construct(int $userId,int  $conferenceId)
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
     * @param int $conferenceId
     */
    public function setConferenceId(int $conferenceId)
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
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

} 