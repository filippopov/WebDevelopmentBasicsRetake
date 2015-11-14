<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/3/2015
 * Time: 7:00 PM
 */

namespace MVC\ViewHelpers;


class TextArea {
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
        $this->options.=$content;
        return $this;
    }


    public function render(){
        $output = "<textarea";
        foreach($this->attributes as $key => $value){
            $output .=" " . $key . "=". '"'.$value. '"';
        }

        $output .=">";
        $output .=$this->options."</textarea><br>";
        echo $output;
    }
} 