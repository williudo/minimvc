<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 08/06/2019
 * Time: 12:04
 */

$config['routes'] = array(
    array('name' => 'home', 'path' => '/', 'controller' => "indexController", 'action' => 'index'),
    array('name' => 'entrar', 'path' => '/entrar', 'controller' => "LoginController", 'action' => 'post'),
    array('name' => 'sair', 'path' => '/sair', 'controller' => "LoginController", 'action' => 'logout'),
    array('name' => 'painel', 'path' => '/painel', 'controller' => "PainelController", 'action' => 'index'),
    array('name' => 'produtos', 'path' => '/painel/produtos', 'controller' => "ProdutosController", 'action' => 'index'),
    array('name' => 'produtos_editar', 'path' => '/painel/produtos/editar', 'controller' => "ProdutosController", 'action' => 'edit'),
    array('name' => 'produtos_cadastrar', 'path' => '/painel/produtos/cadastrar', 'controller' => "ProdutosController", 'action' => 'create'),
    array('name' => 'produtos_excluir', 'path' => '/painel/produtos/excluir', 'controller' => "ProdutosController", 'action' => 'delete'),
);