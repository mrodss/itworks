<?php

namespace Itworks\src\controller;

use Itworks\core\Controller;
use Itworks\src\model\CurriculoModel;
use Itworks\classes\input;

class curriculoController extends Controller
{
    private $curriculoModel;

    public function __construct()
    {
        $this->curriculoModel = new CurriculoModel();
    }

    public function criarCurriculo()
    {
        $this->load('curriculo/form');
    }

    public function salvarCurriculo()
    {
        $dados = $this->getInputPost();

        $result = $this->curriculoModel->insertForm($dados);
        if ($result <= 0) {
            $this->showMessage('Erro', 'Erro na inserção de CURRÍCULO', NULL, 404);
        } else {
            redirect(BASE . 'envio-arquivo?id=' . $result);
        }
    }

    public function upload()
    {
        $id = $_GET['id'];
        $this->load('curriculo/upload', ['id' => $id]);
    }

    public function salvarUpload()
    {
        print_r($_FILES);
        print_r($_POST);
        $nome_atual = explode('.', $_FILES['curriculo']['name']);
        $nome_novo = uniqid() . '.' . end($nome_atual);

        if (move_uploaded_file($_FILES['curriculo']['tmp_name'], DIR_UPLOAD . $nome_novo)) {
            $arquivo_nome_antigo = $_FILES['curriculo']['name'];
            $arquivo = DIR_UPLOAD . $nome_novo;

            //ENVIAR AO BANCO DE DADOS
            $dados = (object)[
                'filename' => $arquivo,
                'curriculo_id' => $_POST['id']
            ];
            $result = $this->curriculoModel->insertUpload($dados);

            if ($result <= 0) {
                $this->showMessage('Erro', 'Não é possivel salvar o arquivo', NULL, 404);
            } else {
                redirect(BASE . 'cadastro-concluido?id');
            }
        }
    }

    public function sucesso()
    {
        $this->load('curriculo/sucesso');
    }

    public function getInputPost()
    {
        return (object)[
            'nome'        => Input::post('nome', FILTER_UNSAFE_RAW),
        ];
    }
}
