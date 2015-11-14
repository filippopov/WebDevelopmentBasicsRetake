<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require_once 'Autoloader.php';

\MVC\Autoloader::init();

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];

$directories = str_replace(basename($self), '', $self);
$requestString = str_replace($directories, '', $uri);

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

$route = new \MVC\Annotations\RouteAnnotationClass("MVC\Controllers\UsersController");
$configUrl = $route->matchAnnotation();


if($configUrl[$requestString]!==null){
    $uriParams = explode("/", $configUrl[$requestString]);
    $controller = $uriParams[0];
    $action = $uriParams[1];
}

$app = new \MVC\Application($controller, $action, $requestParams);
$app->start();


