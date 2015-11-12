<?php
namespace MVC\Controllers;

abstract class Controller
{
    public function __construct()
    {
        $this->onInit();
    }

    protected function onInit(){

    }

    public function isLogged()
    {
        return isset($_SESSION['id']);
    }

    protected function escapeAll(&$toEscape){
        if(is_array($toEscape)){
            foreach($toEscape as $key => &$value){
                if(is_object($value)){
                    $reflection = new \ReflectionClass($value);
                    $properties = $reflection->getProperties();

                    foreach($properties as &$property){
                        $property->setAccessible(true);
                        $property->setValue($value, $this->escapeAll($property->getValue($value)));
                    }

                }else if(is_array($value)){
                    $this->escapeAll($value);
                }else{
                    $value = htmlspecialchars($value);
                }

            }
        }else if(is_object($toEscape)){
            $reflection = new \ReflectionClass($toEscape);
            $properties = $reflection->getProperties();

            foreach($properties as &$property){
                $property->setAccessible(true);
                $property->setValue($toEscape, $this->escapeAll($property->getValue($toEscape)));
            }
        }else{
            $toEscape = htmlspecialchars($toEscape);
        }

        return $toEscape;
    }
}