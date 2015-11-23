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
$isInRole = \MVC\Models\IdentityUser::create()->inRole($_SESSION['id']);
$request = $controller.'/'.$action;



//ConferenceController start

$roleConference = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\ConferenceController");
$configRoleConference = $roleConference->matchAnnotation();
if($configRoleConference[$request]!==null){
    if($configRoleConference[$request]!=$isInRole["name"]){
        header('Location: authorization');
    }
}

$conferenceAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\ConferenceController");
$configConfAuto = $conferenceAuthorization->matchAnnotation();
if($configConfAuto[$request]){
    checkUserId();
}

$routeConference = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\ConferenceController");
$configUrlConf = $routeConference->matchAnnotation();
if($configUrlConf[$request]!==null){
    $uriParamsHall = explode("/", $configUrlConf[$request]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}

//ConferenceController end


//StatusController start
$roleStatus = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\StatusController");
$configRoleStatus = $roleStatus->matchAnnotation();
if($configRoleStatus[$requestString]!==null){
    if($configRoleStatus[$requestString]!=$isInRole["name"]){
        header('Location: authorization');
    }
}

$statusAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\StatusController");
$configStatusAuto = $statusAuthorization->matchAnnotation();
if($configStatusAuto[$requestString]){
    checkUserId();
}

$routeStatus = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\StatusController");
$configUrlStatus = $routeStatus->matchAnnotation();
if($configUrlStatus[$requestString]!==null){
    $uriParamsHall = explode("/", $configUrlStatus[$requestString]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}

//StatusController end

//HallController start

$roleHall = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\HallsController");
$configRoleHall = $roleHall->matchAnnotation();
if($configRoleHall[$requestString]!==null){
    if($configRoleHall[$requestString]!=$isInRole["name"]){
        header('Location: authorization');
    }
}


$hallAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\HallsController");
$configHallAuto = $hallAuthorization->matchAnnotation();
if($configHallAuto[$requestString]){
    checkUserId();
}


$routeHall = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\HallsController");
$configUrlHall = $routeHall->matchAnnotation();
if($configUrlHall[$requestString]!==null){
    $uriParamsHall = explode("/", $configUrlHall[$requestString]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}



//HallController End


//UserController start

$role = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\UsersController");
$configRole = $role->matchAnnotation();
if($configRole[$requestString]!==null){
    if($configRole[$requestString]!=$isInRole["name"]){
        header('Location: authorization');
    }
}

$authorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\UsersController");
$configAuto = $authorization->matchAnnotation();
if($configAuto[$requestString]){
    checkUserId();
}

$route = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\UsersController");
$configUrl = $route->matchAnnotation();
if($configUrl[$requestString]!==null){
    $uriParams = explode("/", $configUrl[$requestString]);
    $controller = $uriParams[0];
    $action = $uriParams[1];
}



//UserController End



$app = new \MVC\Application($controller, $action, $requestParams);
$app->start();




//For All Controllers
function checkUserId(){
    $userId =  \MVC\HttpContext\HttpContext::create()->getIdentity()->getId();
    if($userId===null){
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/conference/login');
    }
}



