<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 08/06/2019
 * Time: 16:10
 */

namespace Core;


abstract class Controller
{
    protected $view;
    private $action;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $this->view = new \stdClass();
        if(isset($_SESSION['toastr'])){
            unset($_SESSION['toastr']);
        }
        if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
            session_start();
        }
    }

    protected function render($data = null, $view = null, $template = false)
    {
        if($data) {
            extract($data);
        }

        if(!$view){
            $view = $this->controllerName() . '/' . debug_backtrace()[1]['function'];
        }

        if($template){
            include_once "App/Views/template/header.phtml";
        }

        if(file_exists("App/Views/".$view.".phtml")) {
            include_once "App/Views/".$view.".phtml";
        }else{
            //include_once "App/Views/404.phtml";
        }

        if($template){
            include_once "App/Views/template/footer.phtml";
        }
    }

    //Método para pegar o nome do controller que está sendo executado.
    private function controllerName(){
        $class = get_class($this); //Ex. App\Controllers\UsersController
        $class = explode('\\', $class); //Ex. [App], [Controllers], [UsersController]
        $class = array_pop($class); //Ex. UsersController
        $class = preg_replace('/Controller$/', '', $class); //Ex. Users
        return strtolower($class); //Ex. users
    }


    protected function content()
    {
        $current = get_class($this);
        $singleClassName = strtolower(str_replace("Controller", '', str_replace("App\\Controllers\\", '',$current)));
        include_once "App/Views/".$singleClassName."/".$this->action.".phtml";
    }

}