<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/18/2015
 * Time: 3:57 PM
 */

namespace MVC\BindingModels\Status;


class StatusBindingModel {
    const COL_NAME = 'name';
    const COL_ID = 'id';

    private $id;
    private $name;

    /**
     * @param string $name
     * @param null $id
     */
    function __construct(string $name,$id = null)
    {
        $this->id = $id;
        $this->name = $name;
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