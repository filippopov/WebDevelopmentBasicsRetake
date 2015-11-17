<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/17/2015
 * Time: 10:00 PM
 */

namespace MVC\BindingModels\Halls;


class HallsBindingModel {
    const COL_NAME = 'name';
    const COL_CAPACITY = 'capacity';
    const COL_ID = 'id';

    private $name;
    private $capacity;
    private $id;

    function __construct($name,$capacity,$id=null)
    {
        $this->capacity = $capacity;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
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
    }



} 