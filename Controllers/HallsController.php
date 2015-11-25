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

    /**
     * @return View
     * @throws \Exception
     * @Authorization()
     */
    public function allHalls(){
        $halls = HallsRepository::create()->orderBy(HallsBindingModel::COL_ID)->findAll();
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

    /**
     * @return View
     * @throws \Exception
     * @Role(admin)
     * @Authorization()
     */
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

    /**
     * @param int $id
     * @return View
     * @Role(admin)
     * @Authorization()
     */
    public function editHall(int $id){
        $hall = HallsRepository::create()->filterById($id)->findOne();

        $hallViewModel = new HallsViewModel(
            $hall->getName(),
            $hall->getCapacity()
        );

        if (isset($_POST['edit-hall'])) {

            if ($_POST['edit-hall-name'] =='' || $_POST['edit-hall-capacity']=='') {
                $hallViewModel->error = 1;
                return new View($hallViewModel);
            }

            $hall->setName($_POST['edit-hall-name'])->setCapacity($_POST['edit-hall-capacity']);
            $result = HallsRepository::save();
            if($result){
                $hallViewModel->setName($_POST['edit-hall-name']);
                $hallViewModel->setCapacity($_POST['edit-hall-capacity']);
                $hallViewModel->success = 1;
                return new View($hallViewModel);
            }

            $hallViewModel->error = 1;
            return new View($hallViewModel);
        }


        return new View($hallViewModel);
    }

    /**
     * @param int $id
     * @Role(admin)
     * @Authorization()
     */
    public function delete(int $id){
        HallsRepository::create()->filterById($id)->delete();
    }

    /**
     * @ROUTE(route/probaroute)
     */
    public function testRoute(){
        echo "Hi from my routing system";
    }
} 