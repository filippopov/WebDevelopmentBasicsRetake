<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/16/2015
 * Time: 7:49 PM
 */

namespace MVC\Controllers;


use MVC\BindingModels\Conference\ConferenceBindingModels;
use MVC\HttpContext\HttpContext;
use MVC\Models\ConferenceRepository;
use MVC\Models\HallsRepository;
use MVC\Models\StatusRepository;
use MVC\View;
use MVC\ViewModels\ConferenceInformation;
use MVC\ViewModels\ConferenceViewModel;
use MVC\ViewModels\HallsViewModel;
use MVC\ViewModels\StatusViewModel;

class ConferenceController extends Controller {

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

    public function addConference(){

        $halls = HallsRepository::create()->findAll();
        $hallsViewModel=[];
        foreach($halls as $hall){
            $hallsViewModel[] = new HallsViewModel(
                $hall->getName(),
                $hall->getCapacity(),
                $hall->getId()
            );
        }

        $this->escapeAll($hallsViewModel);

        $status = StatusRepository::create()->findAll();
        $statusViewModel=[];
        foreach($status as $s){
            $statusViewModel[] = new StatusViewModel(
                $s->getName(),
                $s->getId()
            );
        }

        $this->escapeAll($statusViewModel);

        $allModels = [];
        $allModels[] = $hallsViewModel;
        $allModels[] = $statusViewModel;



        if (isset($_POST['add-conference'])) {
            $conferenceName = $_POST['conference-name'];
            $conferenceBreaks = $_POST['conference-breaks'];
            $conferenceStart = $_POST['conference-start'];
            $conferenceEnd = $_POST['conference-end'];
            $conferenceHallName = $_POST['hall-name'];
            $conferenceStatus = $_POST['status-conference'];



            $conferenceStart = str_replace('/','-',$conferenceStart);
            $startTime = new \DateTime($conferenceStart);
            $stringDateStart = $startTime->format('Y-m-d H:i:s');

            $conferenceEnd = str_replace('/','-',$conferenceEnd);
            $endTime = new \DateTime($conferenceEnd);
            $stringDateEnd = $endTime->format('Y-m-d H:i:s');

            $userId = HttpContext::create()->getIdentity()->getId();

            $conferenceModel = new ConferenceBindingModels($conferenceName,$userId,$stringDateStart,$stringDateEnd,$conferenceBreaks,$conferenceHallName,$conferenceStatus);

            ConferenceRepository::create()->add($conferenceModel);
            ConferenceRepository::save();
        }

        return new View($allModels);
    }
}

//$viewModel = new HallsInformation();
//if (isset($_POST['add-hall'])) {
//    if ($_POST['add-hall-name']=='' || $_POST['add-hall-capacity']=='') {
//        $viewModel->error = true;
//        return new View($viewModel);
//    }
//
//    $hallName = $_POST['add-hall-name'];
//    $hallCapacity = $_POST['add-hall-capacity'];
//
//    $hallModel = new HallsBindingModel($hallName,$hallCapacity);
//
//    HallsRepository::create()->add($hallModel);
//    HallsRepository::save();
//    $viewModel->success = true;
//    return new View($viewModel);
//}
//
//return new View();