<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 08/06/2019
 * Time: 15:03
 */

namespace App\Controllers;
use Core\Controller;
use Core\Container;

class IndexController extends Controller
{
    public function index()
    {
        session_destroy();
        unset($_SESSION);
        $usuarios = Container::getModel("Usuarios");
        $usr = $usuarios->fetchAll();
        $this->render(['nome' => "Willian"], 'entrar', true);
    }
    public function contact()
    {
        $usuarios = Container::getModel("Usuarios");
        $usr = $usuarios->find(1);
        $this->render($usr, 'index/contact');

    }


}