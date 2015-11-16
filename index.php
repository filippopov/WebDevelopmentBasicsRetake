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


