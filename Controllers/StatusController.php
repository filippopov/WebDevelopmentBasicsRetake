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

    /**
     * @return View
     * @throws \Exception
     * @Authorization()
     */
    public function allStatus(){
        $status = StatusRepository::create()->orderBy(StatusBindingModel::COL_ID)->findAll();
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

    /**
     * @return View
     * @throws \Exception
     * @Role(admin)
     * @Authorization()
     */
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

    /**
     * @param int $id
     * @return View
     * @Role(admin)
     * @Authorization()
     */
    public function editStatus(int $id){
        $status = StatusRepository::create()->filterById($id)->findOne();

        $statusViewModel = new StatusViewModel(
            $status->getName()
        );

        if (isset($_POST['edit-status'])) {

            if ($_POST['edit-status-name'] =='') {
                $statusViewModel->error = 1;
                return new View($statusViewModel);
            }

            $status->setName($_POST['edit-status-name']);
            $result = StatusRepository::save();
            if($result){
                $statusViewModel->setName($_POST['edit-status-name']);
                $statusViewModel->success = 1;
                return new View($statusViewModel);
            }

            $statusViewModel->error = 1;
            return new View($statusViewModel);
        }


        return new View($statusViewModel);
    }

    /**
     * @param int $id
     * @Role(admin)
     * @Authorization()
     */
    public function delete($id){
        StatusRepository::create()->filterById($id)->delete();
    }


    /**
     * @ROUTE(st/stroute)
     */
    public function testRoute(){
        echo "Hi from my routing system";
    }
} 