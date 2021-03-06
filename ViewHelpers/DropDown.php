<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/2/2015
 * Time: 9:19 AM
 */

namespace MVC\ViewHelpers;


class DropDown {

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
     * @param string $valueContent
     * @return $this
     */
    public function setDefaultOption(string $valueContent){
        $this->options = "\t<option value=\"\">$valueContent</option>\n".$this->options;

        return $this;
    }

    /**
     * @param string $content
     * @param string $valueKey
     * @param string $valueContent
     * @param null $keySelected
     * @param null $valueSelected
     * @return $this
     */
    public function setContent(string $content, $valueKey = 'id', $valueContent = 'value', $keySelected = null, $valueSelected = null)
    {
        foreach($content as $model){
            $this->options .="\t<option";
            if($keySelected && $valueSelected){
                if($model[$keySelected]== $valueSelected){
                    $this->options .=" selected ";
                }
            }
            $this->options .= " value=\"{$model[$valueKey]}\">" . $model[$valueContent]."</option>\n";
        }

        return $this;
    }

    public function render(){
        $output = "<select";
        foreach($this->attributes as $key => $value){
            $output .=" " . $key . "=". '"'.$value. '"';
        }
        $output .=">\n";
        $output .=$this->options;
        $output .="</select>";

        echo $output;
    }
} 