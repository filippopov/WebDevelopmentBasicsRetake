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
use MVC\Models\ConferenceUserRepository;
use MVC\View;
use MVC\ViewModels\ConferenceUserInformation;
use MVC\ViewModels\ConferenceUserViewModel;

class ConferenceUserController extends Controller{

    public function signInConference($conferenceId){
        $viewModel = new ConferenceUserInformation();
        $userId = HttpContext::create()->getIdentity()->getId();
        if(isset($_POST['sign-in'])){
            $result = ConferenceUserRepository::create()->filterByUserId($userId)->filterByConferenceId($conferenceId)->findOne();
            if($result->getUserId()){
                $viewModel->error = true;
                return new View($viewModel);
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

} 