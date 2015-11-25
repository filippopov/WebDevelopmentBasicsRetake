<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/17/2015
 * Time: 10:46 PM
 */

namespace MVC\ViewModels;


class HallsViewModel {
    private $id;
    private $name;
    private $capacity;

    /**
     * @param string $name
     * @param int $capacity
     * @param null $id
     */
    function __construct(string $name,int $capacity, $id=null )
    {
        $this->setName($name)->setCapacity($capacity)->setId($id);
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
     * @return $this
     */
    public function setCapacity(int $capacity)
    {
        $this->capacity = $capacity;
        return $this;
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
     * @return $this
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
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }


} 