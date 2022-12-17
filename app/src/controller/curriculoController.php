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
        $this->load('curriculo/upload');
    }

    public function salvarUpload()
    {
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
