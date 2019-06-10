<?php
/**
 * Arquivo responsável por carregar a estrutura MVC
 *
 * PHP version 5.6
 *
 * @package  Core
 * @author   Willian Rodrigues <willian.crodrigues90@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/williudo
 *
 */


//Chama o autoload do composer, para carregar as classes e namespaces no padrão psr-4;
require_once "vendor/autoload.php";
require_once "Helpers/functions.php";
//A class Router, que lê as rotas em Config/routes.php, direciona para seu respectivo controller.
$route = new Core\Init\Router;