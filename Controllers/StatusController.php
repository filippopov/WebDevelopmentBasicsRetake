<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/18/2015
 * Time: 4:37 PM
 */

namespace MVC\Controllers;


use MVC\BindingModels\Status\StatusBindingModel;
use MVC\Models\StatusRepository;
use MVC\View;
use MVC\ViewModels\StatusInformation;
use MVC\ViewModels\StatusViewModel;

class StatusController extends Controller {

    public function allStatus(){
        $status = StatusRepository::create()->findAll();
        $statusViewModel=[];
        foreach($status as $s){
            $statusViewModel[] = new StatusViewModel(
                $s->getName(),
                $s->getId()
            );
        }

        $this->escapeAll($statusViewModel);

        return new View($statusViewModel);
    }

    public function addStatus(){

        $viewModel = new StatusInformation();
        if (isset($_POST['add-status'])) {
            if ($_POST['add-status-name']=='') {
                $viewModel->error = true;
                return new View($viewModel);
            }

            $statusName = $_POST['add-status-name'];

            $hallModel = new StatusBindingModel($statusName);

            StatusRepository::create()->add($hallModel);
            StatusRepository::save();
            $viewModel->success = true;
            return new View($viewModel);
        }

        return new View();
    }
} 