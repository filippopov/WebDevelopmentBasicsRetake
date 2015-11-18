<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/18/2015
 * Time: 12:23 AM
 */

namespace MVC\Controllers;


use MVC\BindingModels\Halls\HallsBindingModel;
use MVC\Models\HallsRepository;
use MVC\View;
use MVC\ViewModels\HallsInformation;
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

    public function addHalls(){

        $viewModel = new HallsInformation();
        if (isset($_POST['add-hall'])) {
            if ($_POST['add-hall-name']=='' || $_POST['add-hall-capacity']=='') {
                $viewModel->error = true;
                return new View($viewModel);
            }

            $hallName = $_POST['add-hall-name'];
            $hallCapacity = $_POST['add-hall-capacity'];

            $hallModel = new HallsBindingModel($hallName,$hallCapacity);

            HallsRepository::create()->add($hallModel);
            HallsRepository::save();
            $viewModel->success = true;
            return new View($viewModel);
        }

        return new View();
    }
} 