<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/13/2015
 * Time: 12:56 PM
 */

namespace MVC\Annotations;


class RouteAnnotationClass extends BaseAnnotationClass {
    private $pattern = "/@ROUTE\((([a-zA-Z]+)\/([a-zA-Z]+)\/*(\w*))\)/";
    public  $className;

    function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return mixed
     */
    public function getPattern()
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
                $configUrl[$mapArray[1]]=$controllerName.'/'.$method->getName();
            }
        }

        return $configUrl;
    }
} 