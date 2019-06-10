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


class ProdutosController extends Controller
{
    public function index()
    {
        $prod = Container::getModel("Produtos");
        $produtos = $prod->fetchAll();
        $this->render(["produtos" => $produtos], 'painel/produtos/index', true);
    }

    public function create()
    {
        $un = Container::getModel("UnidadesMedida");
        $unidades_medida = $un->fetchAll();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $this->render(['action' => 'cadastrar', 'unidades_medida' => $unidades_medida], 'painel/produtos/cadastrar', true);
        } else {
            $produto = $this->save('add');
            $_SESSION['toastr'] = ['type' => 'success', 'msg' => 'Produto cadastrado com sucesso!'];
            redirect('/painel/produtos/editar?produto=' . base64_encode($produto));
        }


    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $un = Container::getModel("UnidadesMedida");
            $unidades_medida = $un->fetchAll();

            $p = Container::getModel("Produtos");
            $prod = $p->find(base64_decode($_GET['produto']));

            $this->render(['action' => 'editar',
                'produto' => $prod,
                'unidades_medida' => $unidades_medida], 'painel/produtos/cadastrar', true);
        } else {
            $produto = $this->save('edit');
            $_SESSION['toastr'] = ['type' => 'success', 'msg' => 'Produto atualizado com sucesso!'];
            redirect('/painel/produtos/editar?produto=' . base64_encode($produto['id_produto']));
        }

    }

    public function delete()
    {
        $produto = $this->save('delete');
        $_SESSION['toastr'] = ['type' => 'success', 'msg' => 'Produto excluído com sucesso!'];
        echo json_encode(['toastr' => $_SESSION['toastr']]);

    }

    public function save($action = 'add')
    {
        $p = Container::getModel("Produtos");
        $post = $_POST;

        if (isset($post['valor']))
        {
            $post['valor'] = str_replace('.', '0', $post['valor']);
            $post['valor'] = str_replace(',', '.', $post['valor']);
        }

        if ($action == 'add') {
            $post['id_usuario_cadastro'] = $_SESSION['user']['id_usuario'];
            $post['data_hora_cadastro'] = date('Y/m/d H:i:s');
            $prod = $p->insert($post);
            return $prod;

        } else if ($action == 'edit') {
            $post['id_usuario_cadastro'] = $_SESSION['user']['id_usuario'];
            $post['data_hora_alteracao'] = date('Y/m/d H:i:s');
            $prod = $p->update($post);
            return $prod;
        } else if ($action == 'delete') {

            $post['id_usuario_exclusao'] = $_SESSION['user']['id_usuario'];
            $post['data_hora_exclusao'] = date('Y/m/d H:i:s');
            $prod = $p->delete($post, base64_decode($_GET['produto']));
            return $prod;
        }

    }

}