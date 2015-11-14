<?php
namespace MVC\Controllers;

use MVC\BindingModels\Users\CreateUserBindingModel;
use MVC\BindingModels\Users\LoginBindingModel;
use MVC\BindingModels\Users\UserBindingModel;
use MVC\Models\IdentityUser;
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
        $model = new UserBindingModel($user,$pass);
        $userId = IdentityUser::create()->login($model);
        var_dump($userId);
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

                $userModel = new UserBindingModel($user,$pass);
                if(!$userModel->isValid()){
                    throw new \Exception("Username and password must be at least 5 symbols long");
                }

                \MVC\Models\IdentityUser::add($userModel);
                \MVC\Models\IdentityUser::save();

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

        $userInfo = IdentityUser::create()->filterById($_SESSION['id'])->findOne();

        $userViewModel = new \MVC\ViewModels\User(
                $userInfo->getUsername(),
                $userInfo->getPass(),
                $userInfo->getId()
        );

        $this->escapeAll($userViewModel);

        return new View($userViewModel);
    }

    public function edit(){
        $userInfo = IdentityUser::create()->filterById($_SESSION['id'])->findOne();

        $userViewModel = new \MVC\ViewModels\User(
            $userInfo->getUsername(),
            $userInfo->getPass(),
            $userInfo->getId()
        );

        if (isset($_POST['edit'])) {
            if ($_POST['password'] != $_POST['confirm'] || empty($_POST['password'])) {
                $userViewModel->error = 1;
                return new View($userViewModel);
            }

            $userInfo->setUsername($_POST['username'])->setPass($_POST['password']);
            $result = IdentityUser::save();
            if($result){
                $userViewModel->setUsername($_POST['username']);
                $userViewModel->success = 1;
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