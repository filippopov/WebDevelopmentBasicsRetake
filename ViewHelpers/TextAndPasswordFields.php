<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/3/2015
 * Time: 6:47 PM
 */

namespace MVC\ViewHelpers;


class TextAndPasswordFields {
    private $attributes = [];
    private $options;

    private function __construct(){

    }

    public static function create(){
        return new self();
    }

    public function addAttribute($attributeName, $attributeValue){
        $this->attributes[$attributeName]=$attributeValue;

        return $this;
    }

    public function setContent($content)
    {
        $this->options.=$content.'<br>';
        return $this;
    }


    public function render(){
        $output =$this->options;
        $output .= "<input";
        foreach($this->attributes as $key => $value){
            $output .=" " . $key . "=". '"'.$value. '"';
        }
        $output .="><br>";
        echo $output;
    }
} 