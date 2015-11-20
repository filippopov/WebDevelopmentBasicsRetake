<?php
declare(strict_types=1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require_once 'Autoloader.php';


\MVC\Autoloader::init();

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];

$directories = str_replace(basename($self), '', $self);
$requestString = str_replace($directories, '', $uri);

$requestString = strtolower($requestString);

$requestParams = explode("/", $requestString);

$controller = array_shift($requestParams);
$action = array_shift($requestParams);

\MVC\Core\Database::setInstance(
    \MVC\Config\DatabaseConfig::DB_INSTANCE,
    \MVC\Config\DatabaseConfig::DB_DRIVER,
    \MVC\Config\DatabaseConfig::DB_USER,
    \MVC\Config\DatabaseConfig::DB_PASS,
    \MVC\Config\DatabaseConfig::DB_NAME,
    \MVC\Config\DatabaseConfig::DB_HOST
);

//$thisDate = "2013-02-02 22:17:06";
//$date = new DateTime($thisDate);
//$stringDate = $date->format('Y-m-d H:i:s');
//var_dump($stringDate);
//$creator = \MVC\HttpContext\HttpContext::create()->getIdentity()->getId();
//
//$model = new \MVC\BindingModels\Conference\ConferenceBindingModels("test",$creator,$stringDate,$stringDate,2,1,1);
//
//\MVC\Models\ConferenceRepository::create()->add($model);
//\MVC\Models\ConferenceRepository::create()->save();


//$model = new \MVC\BindingModels\Halls\HallsBindingModel('proba',325);
//
//\MVC\Models\HallsRepository::create()->add($model);
//\MVC\Models\HallsRepository::save();

////
//$probaHalls = \MVC\Models\HallsRepository::create()->orderByDescending(\MVC\BindingModels\Halls\HallsBindingModel::COL_ID)->findAll();
//
//var_dump($probaHalls);


//$confer = \MVC\Models\ConferenceRepository::create()->filterByIdForDelete(22)->delete();
//var_dump($confer);

//$bindingModel = new \MVC\BindingModels\ConferenceUser\ConferenceUserBindingModel(3,4);
//
//\MVC\Models\ConferenceUserRepository::create()->add($bindingModel);
//\MVC\Models\ConferenceUserRepository::save();
//
//$proba = \MVC\Models\ConferenceUserRepository::create()->deleteFilter(27,12)->delete();
//var_dump($proba);

//$result = \MVC\Models\ConferenceUserRepository::create()->filterByUserId(27)->filterByConferenceId(10)->findOne();
//var_dump($result);


$role = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\UsersController");
$configRole = $role->matchAnnotation();

$isInRole = \MVC\Models\IdentityUser::create()->inRole($_SESSION['id']);

if($configRole[$requestString]!==null){
    if($configRole[$requestString]!=$isInRole["name"]){
        header('Location: authorization');
    }
}



$authorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\UsersController");
$configAuto = $authorization->matchAnnotation();

if($configAuto[$requestString]){
   $userId =  \MVC\HttpContext\HttpContext::create()->getIdentity()->getId();
    if($userId===null){
        header('Location: login');
    }

}

$route = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\UsersController");
$configUrl = $route->matchAnnotation();
if($configUrl[$requestString]!==null){
    $uriParams = explode("/", $configUrl[$requestString]);
    $controller = $uriParams[0];
    $action = $uriParams[1];
}


$app = new \MVC\Application($controller, $action, $requestParams);
$app->start();


