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

    /**
     * @param string $name
     * @param int $capacity
     * @param null $id
     */
    function __construct(string $name,int $capacity,$id=null)
    {
        $this->capacity = $capacity;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
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
     * @param int $capacity
     */
    public function setCapacity(int $capacity)
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
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }



} 