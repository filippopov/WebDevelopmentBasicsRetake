<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/2/2015
 * Time: 10:03 PM
 */

namespace MVC\ViewHelpers;


class GenerateTable {
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

    public function setHeaders($valueContent=[]){
        $this->options="<tr>";
        foreach($valueContent as $v){

            $this->options .= "<th>$v</th>";
        }
        $this->options.="</tr>";
        return $this;
    }

    public function setContentUser($content)
    {

        foreach($content as $v){
            $this->options.="<tr id=\"tr-{$v->getId()}\">";
            $this->options .= "<td>{$v->getId()}</td>";
            $this->options .= "<td>{$v->getUsername()}</td>";
            $this->options .= "<td><a href=\"\" class=\"delete\" id=\"{$v->getId()}\">Delete</a></td>";
            $this->options .= "<td><a href=\"\" class=\"admin\" id=\"{$v->getId()}\">Admin Role</a></td>";
            $this->options.="</tr>";
        }

        return $this;
    }


    public function setContentConference($content)
    {

        foreach($content as $v){
            $this->options.="<tr id=\"tr-{$v->getId()}\">";
            $this->options .= "<td>{$v->getId()}</td>";
            $this->options .= "<td><a href=\"http://localhost:8004/Web-Development-Basics-Retake/conference/conferenceinfo/{$v->getId()}\">{$v->getName()}</a></td>";
            $this->options .= "<td>{$v->getCreatorName()}</td>";
            $this->options .= "<td>{$v->getStartTime()}</td>";
            $this->options .= "<td>{$v->getEndTime()}</td>";
            $this->options .= "<td>{$v->getNumberOfBreaks()}</td>";
            $this->options .= "<td>{$v->getHallsName()}</td>";
            $this->options .= "<td>{$v->getStatusName()}</td>";
            $this->options .= "<td><a href=\"\" id=\"{$v->getId()}\">Delete</a></td>";
            $this->options.="</tr>";
        }

        return $this;
    }

    public function setContentConferenceOneRow($v)
    {


        $this->options.="<tr id=\"tr-{$v->getId()}\">";
        $this->options .= "<td>{$v->getId()}</td>";
        $this->options .= "<td><a href=\"http://localhost:8004/Web-Development-Basics-Retake/conference/editconference/{$v->getId()}\">{$v->getName()}</a></td>";
        $this->options .= "<td>{$v->getCreatorName()}</td>";
        $this->options .= "<td>{$v->getStartTime()}</td>";
        $this->options .= "<td>{$v->getEndTime()}</td>";
        $this->options .= "<td>{$v->getNumberOfBreaks()}</td>";
        $this->options .= "<td>{$v->getHallsName()}</td>";
        $this->options .= "<td>{$v->getStatusName()}</td>";
        $this->options.="</tr>";

        return $this;
    }

    public function setContentHall($content)
    {

        foreach($content as $v){
            $this->options.="<tr id=\"tr-{$v->getId()}\">";
            $this->options .= "<td>{$v->getId()}</td>";
            $this->options .= "<td><a href=\"http://localhost:8004/Web-Development-Basics-Retake/halls/edithall/{$v->getId()}\">{$v->getName()}</a></td>";
            $this->options .= "<td>{$v->getCapacity()}</td>";
            $this->options .= "<td><a href=\"\" id=\"{$v->getId()}\">Delete</a></td>";
            $this->options.="</tr>";
        }

        return $this;
    }

    public function setContentYourConferences($content)
    {

        foreach($content as $v){
            $this->options.="<tr>";
            $this->options .= "<td>{$v->getConferenceName()}</td>";
            $this->options .= "<td>{$v->getConferenceStart()}</td>";
            $this->options .= "<td>{$v->getConferenceEnd()}</td>";
            $this->options.="</tr>";
        }

        return $this;
    }

    public function setContentLectors($content)
    {

        foreach($content as $v){
            $this->options.="<tr>";
            $this->options .= "<td>{$v->getLectorName()}</td>";
            $this->options.="</tr>";
        }

        return $this;
    }

    public function setContentUsersInConference($content)
    {

        foreach($content as $v){
            $this->options.="<tr>";
            $this->options .= "<td>{$v->getUserName()}</td>";
            $this->options .= "<td><a href=\"\" class=\"add\" id=\"{$v->getUserId()}-{$v->getConferenceId()}\">Add as lector</a></td>";
            $this->options .= "<td><a href=\"\" class=\"remove\" id=\"{$v->getUserId()}-{$v->getConferenceId()}\">Remove as lector</a></td>";
            $this->options.="</tr>";
        }

        return $this;
    }



    public function setContentStatus($content)
    {

        foreach($content as $v){
            $this->options.="<tr id=\"tr-{$v->getId()}\">";
            $this->options .= "<td>{$v->getId()}</td>";
            $this->options .= "<td><a href=\"http://localhost:8004/Web-Development-Basics-Retake/status/editstatus/{$v->getId()}\">{$v->getName()}</a></td>";
            $this->options .= "<td><a href=\"\" id=\"{$v->getId()}\">Delete</a></td>";
            $this->options.="</tr>";
        }

        return $this;
    }

    public function render(){
        $output = "<table";
        foreach($this->attributes as $key => $value){
            $output .=" " . $key . "=". '"'.$value. '"';
        }
        $output .=">\n";
        $output .=$this->options;
        $output .="</table>";

        echo $output;
    }
}