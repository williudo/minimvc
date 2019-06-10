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

class LoginController extends Controller
{
    public function post(){

        $usuarios = Container::getModel("Usuarios");
        $usr = $usuarios->logar($_POST['usuario'], hashPassword($_POST['senha']));
        if($usr){
            $_SESSION['logado'] = true;
            $_SESSION['user'] = $usr;
            redirect('/painel');
        }else{
            $_SESSION['erros'] = [["titulo" => "Oops!", "mensagem" => "Usuário e/ou senha inválidos"]];
            redirect('/');
        }

    }

    public function logout(){

        session_destroy();
        unset($_SESSION);
        redirect('/');


    }


}