<?php
namespace MVC;

class Application
{
    private $controllerName;
    private $actionName;
    private $requestParams = [];

    private $controller;

    const CONTROLLERS_NAMESPACE = 'MVC\\Controllers\\';
    const CONTROLLERS_SUFFIX = 'Controller';

    /**
     * @param string $controllerName
     * @param string $actionName
     * @param array $requestParams
     */
    public function __construct(string $controllerName, string $actionName, array $requestParams = [])
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->requestParams = $requestParams;
    }

    public function start()
    {
        $this->initController();

        View::$controllerName = $this->controllerName;
        View::$actionName = $this->actionName;

        call_user_func_array(
            [
                $this->controller,
                $this->actionName
            ],
            $this->requestParams
        );
    }

    private function initController()
    {
        $controllerName =
            self::CONTROLLERS_NAMESPACE
            . $this->controllerName
            . self::CONTROLLERS_SUFFIX;

        $this->controller = new $controllerName();
    }
}