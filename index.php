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

//LectorConferenceController start

$lectorConfAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\LectorConferenceController");
$configLecConfAuto = $lectorConfAuthorization->matchAnnotation();
if($configLecConfAuto[$request]){
    checkUserId();
}

$lectorCoUser = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\LectorConferenceController");
$configLecctorConferenceUser = $lectorCoUser->matchAnnotation();
if($configLecctorConferenceUser[$request]!==null){
    $uriParamsHall = explode("/", $configLecctorConferenceUser[$request]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}

//LectorConferenceController end

//RoleUserController start
$roleUserAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\RoleUserController");
$configRoleUserAuto = $roleUserAuthorization->matchAnnotation();
if($configRoleUserAuto[$request]){
    checkUserId();
}

$routeRoleUser = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\RoleUserController");
$configRoleUser = $routeRoleUser->matchAnnotation();
if($configRoleUser[$request]!==null){
    $uriParamsHall = explode("/", $configRoleUser[$request]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}

//RoleUserController end


//ConferenceUserController start
$conferenceUserAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\ConferenceUserController");
$configConfUserAuto = $conferenceUserAuthorization->matchAnnotation();
if($configConfUserAuto[$request]){
    checkUserId();
}

$roleConferenceUser = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\ConferenceUserController");
$configRoleConferenceUser = $roleConferenceUser->matchAnnotation();
if($configRoleConferenceUser[$request]!==null){
    if($configRoleConferenceUser[$request]!=$isInRole["name"]){
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/users/authorization');
    }
}

$routeConferenceUser = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\ConferenceUserController");
$configUrlConfUser = $routeConferenceUser->matchAnnotation();
if($configUrlConfUser[$request]!==null){
    $uriParamsHall = explode("/", $configUrlConfUser[$request]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}

//ConferenceUserController end



//ConferenceController start

$conferenceAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\ConferenceController");
$configConfAuto = $conferenceAuthorization->matchAnnotation();
if($configConfAuto[$request]){
    checkUserId();
}

$roleConference = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\ConferenceController");
$configRoleConference = $roleConference->matchAnnotation();
if($configRoleConference[$request]!==null){
    if($configRoleConference[$request]!=$isInRole["name"]){
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/users/authorization');
    }
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

$statusAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\StatusController");
$configStatusAuto = $statusAuthorization->matchAnnotation();
if($configStatusAuto[$request]){
    checkUserId();
}


$roleStatus = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\StatusController");
$configRoleStatus = $roleStatus->matchAnnotation();
if($configRoleStatus[$request]!==null){
    if($configRoleStatus[$request]!=$isInRole["name"]){
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/users/authorization');
    }
}


$routeStatus = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\StatusController");
$configUrlStatus = $routeStatus->matchAnnotation();
if($configUrlStatus[$request]!==null){
    $uriParamsHall = explode("/", $configUrlStatus[$request]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}

//StatusController end

//HallController start

$hallAuthorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\HallsController");
$configHallAuto = $hallAuthorization->matchAnnotation();
if($configHallAuto[$request]){
    checkUserId();
}

$roleHall = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\HallsController");
$configRoleHall = $roleHall->matchAnnotation();
if($configRoleHall[$request]!==null){
    if($configRoleHall[$request]!=$isInRole["name"]){
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/users/authorization');
    }
}





$routeHall = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\HallsController");
$configUrlHall = $routeHall->matchAnnotation();
if($configUrlHall[$request]!==null){
    $uriParamsHall = explode("/", $configUrlHall[$request]);
    $controller = $uriParamsHall[0];
    $action = $uriParamsHall[1];
}



//HallController End


//UserController start

$authorization = new \MVC\Annotations\AuthorizationAnnotationClass("MVC\Controllers\UsersController");
$configAuto = $authorization->matchAnnotation();
if($configAuto[$request]){
    checkUserId();
}


$role = new \MVC\Annotations\RolesAnnotationClass("MVC\Controllers\UsersController");
$configRole = $role->matchAnnotation();
if($configRole[$request]!==null){
    if($configRole[$request]!=$isInRole["name"]){
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/users/authorization');
    }
}



$route = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\UsersController");
$configUrl = $route->matchAnnotation();
if($configUrl[$request]!==null){
    $uriParams = explode("/", $configUrl[$request]);
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
        header('Location: http://localhost:8004/Web-Development-Basics-Retake/users/login');
    }
}



