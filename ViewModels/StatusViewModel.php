<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/18/2015
 * Time: 3:48 PM
 */

namespace MVC\ViewModels;


class StatusViewModel {
    private $id;
    private $name;

    function __construct($name, $id = null)
    {
        $this->setId($id)->setName($name);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


} 