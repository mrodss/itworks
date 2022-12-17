<?php

namespace Itworks\src\controller;

use Itworks\core\Controller;
use Itworks\src\model\ContaModel;
use Itworks\classes\input;

class ContaController extends Controller
{

    private $contaModel;

    public function __construct()
    {
        $this->contaModel = new ContaModel();
    }

    /**
     * CARREGA A PÁGINA PRINCIPAL
     * @return void
     */

    public function index()
    {
        $listaExtrato = $this->contaModel->getAll();

        $this->load('conta/main', ['listaExtrato' => $listaExtrato]);
    }

    public function novo()
    {
        $this->load('conta/novo');
    }

    public function salvar()
    {
        $registro = $this->getInputPost();

        $result = $this->contaModel->insert($registro);
        if ($result <= 0) {
            echo ' Erro';
        } else {
            redirect(BASE . 'conta-editar?id=' . $result);
        }
    }

    public function getInputPost()
    {
        return (object)[
            'valor'        => Input::post('txtValor', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION),
            'movimentacao' => Input::post('selMovimentacao', FILTER_UNSAFE_RAW)
        ];
    }

    public function extrato()
    {


        echo "Extrato da Conta";

        $obj = new \stdClass();
        $obj->valor = 10.99;
        $obj->movimentacao = 'CREDITO';
        $obj->dataRegistro = date('Y-m-d H:i:s');

        $result = $this->contaModel->insert($obj);
        if ($result <= 0) {
            echo ' Erro';
        } else {
            echo ' Sucesso';
        }
    }

    // public function editar()
    // {
    //     $id = Input::get('id');
    //     $conta = $this->contaModel->getById((int)$id);

    //     $this->load(
    //         'conta/editar',
    //         [
    //             'conta' => $conta
    //         ]
    //     );
    // }
}
