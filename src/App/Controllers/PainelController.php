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


class PainelController extends Controller
{
    public function index()
    {
        $usuarios = Container::getModel("Usuarios");
        $usr = $usuarios->fetchAll();
        $this->render(null, 'painel/index', true);
    }
    public function contact()
    {
        $usuarios = Container::getModel("Usuarios");
        $usr = $usuarios->find(1);
        $this->render($usr, 'index/contact');

    }


}