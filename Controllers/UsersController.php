<?php
namespace MVC\Controllers;

use MVC\BindingModels\Users\UserBindingModel;
use MVC\HttpContext\HttpContext;
use MVC\Models\IdentityUser;
use MVC\Models\RoleUserRepository;
use MVC\Models\User;
use MVC\View;
use MVC\ViewModels\LoginInformation;
use MVC\ViewModels\RegisterInformation;
use MVC\ViewModels\RoleUserViewModel;

class UsersController extends Controller
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

    private function initLogin(string $user, string $pass)
    {
        $model = new UserBindingModel($user,$pass);
        $userId = IdentityUser::create()->login($model);
//        $_SESSION['id'] = $userId;
        HttpContext::create()->setSession('id')->setSessionValue($userId)->saveSession();
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

    /**
     * @Authorization()
     */
    public function profile()
    {
//        if (!HttpContext::create()->getIdentity()->getId()) {
//            header("Location: login");
//        }

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

    public function logout(){
        HttpContext::create()->deleteSession('id');
        header('Location: login');
    }

    /**
     * @ROUTE(proba/proba)
     */
    public function test(){

        echo("zdrasti");
    }


    /**
     * @Role(admin)
     */
    public function adminpanel(){
        $allViewModels = [];
        $users = IdentityUser::create()->findAll();
        $userViewModel=[];
        foreach($users as $user){
            $userViewModel[]= new \MVC\ViewModels\User(
                $user->getUsername(),
                $user->getPass(),
                $user->getId()
            );
        }

        $allAdminsName = RoleUserRepository::create()->filterByRoleId(1)->findAll();
        $adminViewModel = [];
        foreach($allAdminsName as $admin){
            $adminViewModel[] = new RoleUserViewModel(
                $admin->getUserId(),
                $admin->getRoleId(),
                $admin->getRoleName(),
                $admin->getUsername()
            );
        }

        $allViewModels[] = $userViewModel;
        $allViewModels[] = $adminViewModel;

        $this->escapeAll($allViewModels);

        return new View($allViewModels);

    }

    public function authorization(){

        return new View();
    }

    public function delete($id){
        IdentityUser::create()->filterById($id)->delete();
    }

    /**
     * @Authorization()
     */
    public function auto(){
        echo "Login user!!!!";
    }


}