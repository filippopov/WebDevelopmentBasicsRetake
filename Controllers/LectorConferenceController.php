<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/22/2015
 * Time: 11:26 AM
 */

namespace MVC\Controllers;


use MVC\BindingModels\LectorConference\LectorConferenceBindingModel;
use MVC\Models\LectorConferenceRepository;

class LectorConferenceController extends Controller {

    /**
     * @param int $lectorId
     * @param int $conferenceId
     * @Authorization()
     */
    public function addLector(int $lectorId,int $conferenceId){
        $model = new LectorConferenceBindingModel($lectorId, $conferenceId);
        LectorConferenceRepository::create()->add($model);
        LectorConferenceRepository::save();
    }

    /**
     * @param int $lectorId
     * @param int $conferenceId
     * @Authorization()
     */
    public function removeLector(int $lectorId,int $conferenceId){
        LectorConferenceRepository::create()->deleteFilter($lectorId,$conferenceId)->delete();
    }

    /**
     * @ROUTE(lec/conf)
     */
    public function test(){
        echo "Echo from LectorConference";
    }
} 