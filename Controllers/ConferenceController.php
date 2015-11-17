<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/16/2015
 * Time: 7:49 PM
 */

namespace MVC\Controllers;


use MVC\Models\ConferenceRepository;
use MVC\View;
use MVC\ViewModels\ConferenceViewModel;

class ConferenceController extends Controller {

    public function addConference(){
        return new View();
    }

    public function allConference(){

        $conferences = ConferenceRepository::create()->findAll();
        $conferencesViewModel=[];
        foreach($conferences as $conference){
            $conferencesViewModel[] = new ConferenceViewModel(
                $conference->getName(),
                $conference->getCreatorName(),
                $conference->getStartTime(),
                $conference->getEndTime(),
                $conference->getNumberOfBreaks(),
                $conference->getHallsName(),
                $conference->getStatusName(),
                $conference->getId()
            ) ;

        }
        $this->escapeAll($conferencesViewModel);

        return new View($conferencesViewModel);
    }
} 