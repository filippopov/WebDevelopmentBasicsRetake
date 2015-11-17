<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/18/2015
 * Time: 12:23 AM
 */

namespace MVC\Controllers;


use MVC\Models\HallsRepository;
use MVC\View;
use MVC\ViewModels\HallsViewModel;

class HallsController extends Controller {

    public function allHalls(){
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

        return new View($hallsViewModel);
    }
} 