<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/20/2015
 * Time: 9:05 PM
 */

namespace MVC\Controllers;


use MVC\BindingModels\ConferenceUser\ConferenceUserBindingModel;
use MVC\HttpContext\HttpContext;
use MVC\Models\ConferenceRepository;
use MVC\Models\ConferenceUserRepository;
use MVC\Models\IdentityUser;
use MVC\Models\LectorConferenceRepository;
use MVC\View;
use MVC\ViewModels\ConferenceUserInformation;
use MVC\ViewModels\ConferenceUserViewModel;
use MVC\ViewModels\LectorConferenceViewModel;

class ConferenceUserController extends Controller{

    public function signInConference($conferenceId){
        $viewModel = new ConferenceUserInformation();
        $userId = HttpContext::create()->getIdentity()->getId();
        $conferenceRepository = ConferenceRepository::create()->filterById($conferenceId)->findOne();
        $creatorId = $conferenceRepository->getCreatorId();
        $allConferenceOfUser = ConferenceUserRepository::create()->filterByUserId($userId)->findAll();
        $conferenceOfUserTimeNeed =[];
        foreach($allConferenceOfUser as $conferenceOfUser) {
            $conferenceOfUserTimeNeed[] = new ConferenceUserViewModel(
                $conferenceOfUser->getUserId(),
                $conferenceOfUser->getConferenceId(),
                $conferenceOfUser->getConferenceStart(),
                $conferenceOfUser->getConferenceEnd(),
                $conferenceOfUser->getConferenceName(),
                $conferenceOfUser->getUserName()
            );
        }

        if(isset($_POST['sign-in'])){
            $result = ConferenceUserRepository::create()->filterByUserId($userId)->filterByConferenceId($conferenceId)->findOne();
            if($userId == $creatorId){
                $viewModel->creatorError = true ;
                return new View($viewModel);
            }
            if($result->getUserId()){
                $viewModel->error = true;
                return new View($viewModel);
            }
            foreach($conferenceOfUserTimeNeed as $conferenceTime){
                $oldConferenceStart = $conferenceTime->getConferenceStart();
                $oldConferenceEnd = $conferenceTime->getConferenceEnd();

                $newConferenceStart = $conferenceRepository->getStartTime();
                $newConferenceEnd = $conferenceRepository->getEndTime();

                $isStartInRange = $this->check_in_range($oldConferenceStart, $oldConferenceEnd, $newConferenceStart);
                if($isStartInRange){
                    $viewModel->timeCollisionError = true ;
                    return new View($viewModel);
                }
                $isEndInRange = $this->check_in_range($oldConferenceStart, $oldConferenceEnd, $newConferenceEnd);
                if($isEndInRange){
                    $viewModel->timeCollisionError = true ;
                    return new View($viewModel);
                }
            }

            $model = new ConferenceUserBindingModel($userId,$conferenceId);
            ConferenceUserRepository::create()->add($model);
            ConferenceUserRepository::save();
            $viewModel->success = true;
            return new View($viewModel);
        }
        return new View($viewModel);
    }

    public function signOutConference($conferenceId){
        $viewModel = new ConferenceUserInformation();
        $userId = HttpContext::create()->getIdentity()->getId();
        if(isset($_POST['sign-out'])){
            $delete = ConferenceUserRepository::create()->deleteFilter($userId,$conferenceId)->delete();
            if($delete){
                $viewModel->success = true;
                return new View($viewModel);
            }
            $viewModel->error = true;
            return new View($viewModel);
        }
        return new View($viewModel);
    }

    public function allConferencesOfOneUser(){
        $userId = HttpContext::create()->getIdentity()->getId();
        $conferencesViewModel = [];
        $conferences = ConferenceUserRepository::create()->filterByUserId($userId)->findAll();

        foreach($conferences as $conference){
            $conferencesViewModel[]= new ConferenceUserViewModel(
                $conference->getUserId(),
                $conference->getConferenceId(),
                $conference->getConferenceStart(),
                $conference->getConferenceEnd(),
                $conference->getConferenceName(),
                $conference->getUserName()
            );
        }

        $this->escapeAll($conferencesViewModel);
        return new View($conferencesViewModel);

    }

    public function allUsersSignInForThisConference($conferenceId){
        $usersInConference = ConferenceUserRepository::create()->filterByConferenceId($conferenceId)->findAll();
        $allViewModels = [];
        $usersInConferenceViewModel = [];
        foreach($usersInConference as $users){
            $usersInConferenceViewModel[]=new ConferenceUserViewModel(
                $users->getUserId(),
                $users->getConferenceId(),
                $users->getConferenceStart(),
                $users->getConferenceEnd(),
                $users->getConferenceName(),
                $users->getUserName()
            );
        }

        $lectorsInConference  = LectorConferenceRepository::create()->filterByConferenceId($conferenceId)->findAll();
        $lectorsInConferenceViewModel = [];
        foreach($lectorsInConference as $lector){
            $lectorsInConferenceViewModel[] = new LectorConferenceViewModel(
                $lector->getLectorName(),
                $lector->getConferenceName(),
                $lector->getConferenceId(),
                $lector->getConferenceName()
            );
        }

        $allViewModels[] = $usersInConferenceViewModel;
        $allViewModels[] = $lectorsInConferenceViewModel;

        $this->escapeAll($allViewModels);
        return new View($allViewModels);
    }

    private function check_in_range($start_date, $end_date, $date_from_user)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }



} 