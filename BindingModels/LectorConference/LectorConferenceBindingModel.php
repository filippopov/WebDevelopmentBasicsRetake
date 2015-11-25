<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 10:40 AM
 */

namespace MVC\BindingModels\LectorConference;


class LectorConferenceBindingModel {
    private $lectorId;
    private $conferenceId;

    /**
     * @param int $lectorId
     * @param int $conferenceId
     */
    function __construct(int $lectorId,int $conferenceId)
    {
        $this->conferenceId = $conferenceId;
        $this->lectorId = $lectorId;
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
    public function getLectorId()
    {
        return $this->lectorId;
    }

    /**
     * @param int $lectorId
     */
    public function setLectorId(int $lectorId)
    {
        $this->lectorId = $lectorId;
    }



} 