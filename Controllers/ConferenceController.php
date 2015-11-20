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

        $conferences = ConferenceRepository::create()->orderBy(ConferenceBindingModels::COL_ID)->findAll();
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
        $errorModel = new ConferenceInformation();
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
        $allModels[] = $errorModel;



        if (isset($_POST['add-conference'])) {
            if ($_POST['conference-name']=='' || $_POST['conference-breaks']=='' || $conferenceStart = $_POST['conference-start']==''||
                    $conferenceEnd = $_POST['conference-end']==''||$_POST['hall-name']==''||$_POST['status-conference']=='') {
                $errorModel->error = true;
                return new View($allModels);
            }
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
            $errorModel->success = true;
            return new View($allModels);

        }

        return new View($allModels);

    }

    public function editConference($id){
        $conference = ConferenceRepository::create()->filterById($id)->findOne();

        $conferenceViewModel = new ConferenceViewModel(
            $conference->getName(),
            $conference->getCreatorName(),
            $conference->getStartTime(),
            $conference->getEndTime(),
            $conference->getNumberOfBreaks(),
            $conference->getHallsName(),
            $conference->getStatusName()
        );

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
        $allModels[] = $conferenceViewModel;

        if (isset($_POST['edit-conference'])) {

            if ($_POST['conference-name-edit'] =='' || $_POST['conference-breaks-edit']==''|| $_POST['conference-start-edit']==''||
                $_POST['conference-end-edit']==''|| $_POST['hall-name-edit']==''|| $_POST['status-conference-edit']=='') {
                $conferenceViewModel->error = 1;
                return new View($allModels);
            }

            $conferenceStart = str_replace('/','-',$_POST['conference-start-edit']);
            $startTime = new \DateTime($conferenceStart);
            $stringDateStart = $startTime->format('Y-m-d H:i:s');

            $conferenceEnd = str_replace('/','-',$_POST['conference-end-edit']);
            $endTime = new \DateTime($conferenceEnd);
            $stringDateEnd = $endTime->format('Y-m-d H:i:s');

            $numberOFBreaks = intval($_POST['conference-breaks-edit']);
            $numberOfHall = intval($_POST['hall-name-edit']);
            $numberOfStatus = intval($_POST['status-conference-edit']);

            $conference->setName($_POST['conference-name-edit'])
            ->setNumberOfBreaks($numberOFBreaks)
            ->setStartTime($stringDateStart)
            ->setEndTime($stringDateEnd)
            ->setHallsName($numberOfHall)
            ->setStatusName($numberOfStatus);

            $result = ConferenceRepository::save();

            var_dump($result);
            if($result){
                $conferenceViewModel->setName($_POST['conference-name-edit']);
                $conferenceViewModel->setNumberOfBreaks($_POST['conference-breaks-edit']);
                $conferenceViewModel->success = 1;
                return new View($allModels);
            }

            $conferenceViewModel->error = 1;
            return new View($allModels);
        }


        return new View($allModels);
    }

    public function delete($id){
        ConferenceRepository::create()->filterByIdForDelete($id)->delete();
    }
}

