<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/21/2015
 * Time: 11:01 AM
 */

namespace MVC\ViewModels;


class ConferenceCountUserViewModel {

    private $countUsers;

    function __construct($countUsers)
    {
        $this->countUsers = $countUsers;
    }


    /**
     * @return mixed
     */
    public function getCountUsers()
    {
        return $this->countUsers;
    }

} 