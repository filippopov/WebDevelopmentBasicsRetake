<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/3/2015
 * Time: 5:40 PM
 */

namespace MVC\ViewHelpers;


class RadioAndCheckButtons {
    private $attributes = [];
    private $options;

    private function __construct(){

    }

    public static function create(){
        return new self();
    }

    /**
     * @param string $attributeName
     * @param string $attributeValue
     * @return $this
     */
    public function addAttribute(string $attributeName,string $attributeValue){
        $this->attributes[$attributeName]=$attributeValue;

        return $this;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content)
    {
        $this->options.=$content.'<br>';
        return $this;
    }


    public function render(){
        $output = "<input";
        foreach($this->attributes as $key => $value){
            $output .=" " . $key . "=". '"'.$value. '"';
        }
        $output .=">";
        $output .=$this->options;
        echo $output;
    }
}

