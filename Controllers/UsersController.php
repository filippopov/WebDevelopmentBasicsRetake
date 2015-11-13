<?php
namespace MVC\Controllers;

use MVC\BindingModels\Users\CreateUserBindingModel;
use MVC\BindingModels\Users\LoginBindingModel;
use MVC\Models\User;
use MVC\View;
use MVC\ViewModels\LoginInformation;
use MVC\ViewModels\RegisterInformation;

class UsersController extends BaseController
{

    public function login()
    {
        $viewModel = new LoginInformation();

        if (isset($_POST['username'], $_POST['password'])) {
            try {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $this->initLogin($user, $pass);
            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();
                return new View($viewModel);
            }
        }

        return new View($viewModel);
    }

    private function initLogin($user, $pass)
    {
        $userModel = new User();
        $model = new LoginBindingModel();
        $model->setUsername($user);
        $model->setPassword($pass);

        $userId = $userModel->login($model);
        $_SESSION['id'] = $userId;
        header("Location: profile");
    }

    public function register()
    {
        $viewModel = new RegisterInformation();

        if (isset($_POST['username'], $_POST['password'])) {
            try {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $userModel = new User();
                $model = new CreateUserBindingModel();
                $model->setUsername($user);
                $model->setPassword($pass);
                $userModel->register($model);

                $this->initLogin($user, $pass);
            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();
                return new View($viewModel);
            }
        }

        return new View();
    }

    public function profile()
    {
        if (!$this->isLogged()) {
            header("Location: login");
        }

        $userModel = new User();
        $userInfo = $userModel->getInfo($_SESSION['id']);


        $userViewModel = new \MVC\ViewModels\User(
            $userInfo['username'],
            $userInfo['password'],
            $userInfo['id']
        );

        $this->escapeAll($userViewModel);

        return new View($userViewModel);
    }

    public function edit(){
        $userModel = new User();
        $userInfo = $userModel->getInfo($_SESSION['id']);


        $userViewModel = new \MVC\ViewModels\User(
            $userInfo['username'],
            $userInfo['password'],
            $userInfo['id']

        );

        if (isset($_POST['edit'])) {
            if ($_POST['password'] != $_POST['confirm'] || empty($_POST['password'])) {
                $userViewModel->error = 1;
                return new View($userViewModel);
            }

            if ($userModel->edit(
                $_POST['username'],
                $_POST['password'],
                $_SESSION['id']
            )) {
                $userViewModel->success = 1;
                $userViewModel->setUsername($_POST['username']);
                $userViewModel->setPass($_POST['password']);

                return new View($userViewModel);
            }

            $userViewModel->error = 1;
            return new View($userViewModel);
        }
        return new View($userViewModel);
    }

    /**
     * @ROUTE(proba/proba)
     */
    public function test(){

        echo("zdrasti");
    }


    /**
     * @ROUTE(proba/stana)
     */
    public function hihi(){

        echo "Routhing system - done";
    }

}