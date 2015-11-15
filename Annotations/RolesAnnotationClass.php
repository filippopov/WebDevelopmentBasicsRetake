<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/15/2015
 * Time: 4:10 PM
 */

namespace MVC\Annotations;


class RolesAnnotationClass extends BaseAnnotationClass {
    private $pattern = "/@Role\((\w+)\)/";
    public  $className;

    function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    private function getClassName()
    {
        return $this->className;
    }

    /**
     * @return mixed
     */
    private function getPattern()
    {
        return $this->pattern;
    }



    public function matchAnnotation(){
        $nameArray = explode(DIRECTORY_SEPARATOR,self::getClassName());
        $name  = $nameArray[2];
        preg_match("/(\w+)Controller/", $name, $output_array);
        $controllerName = strtolower($output_array[1]);
        $reflection = new \ReflectionClass(self::getClassName());
        $methods = $reflection->getMethods();
        foreach($methods as $method){
            if($method->getDocComment()!=false){
                $mapString = $method->getDocComment();
                preg_match(self::getPattern(),$mapString,$mapArray);
                $configRole[$controllerName.'/'.$method->getName()]=$mapArray[1];
            }
        }

        return $configRole;
    }
} 