<?php


namespace Core\Init;


class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    protected function initRoutes()
    {
        include_once __DIR__.'/../../Config/routes.php';
        $this->setRoutes($config['routes']);
    }

    protected function getUrl()
    {
        $uri = $_SERVER['REQUEST_URI'] == '/' ? $_SERVER['REQUEST_URI'] : preg_replace('/[\/]$/',"",$_SERVER['REQUEST_URI']);
        return parse_url($uri, PHP_URL_PATH);
    }

    protected function run($url)
    {
        array_walk($this->routes, function($routes, $index) use($url){
            if($url == $routes['path']){
                $class = "App\\Controllers\\".ucfirst($routes['controller']);
                if(file_exists($class.'.php')) {
                    $controller = new $class;
                    $action = $routes['action'];
                    $controller->$action();
                }else{
                    $class = 'App\\Controllers\\ErrorsController';
                    $controller = new $class;
                    $action = 'notFound';
                    $controller->$action();
                }
            }

        });
    }

    protected function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }
}