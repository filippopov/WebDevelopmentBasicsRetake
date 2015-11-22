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

    function __construct($lectorId, $conferenceId)
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
     * @param mixed $conferenceId
     */
    public function setConferenceId($conferenceId)
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
     * @param mixed $lectorId
     */
    public function setLectorId($lectorId)
    {
        $this->lectorId = $lectorId;
    }



} 