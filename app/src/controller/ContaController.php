<?php

namespace Itworks\src\controller;
use Itworks\src\model\ContaModel;

class ContaController
{

    private $contaModel;

    public function __construct()
    {
        $this->contaModel = new ContaModel();
    }

    public function extrato(){
        
               
        echo "Extrato da Conta";

        $obj = new \stdClass();
        $obj->valor = 10.99;
        $obj->movimentacao = 'CREDITO';
        $obj->dataRegistro = date('Y-m-d H:i:s');

        $result = $this->contaModel->insert($obj);
        if($result <=0){
            echo ' Erro';
        }else{
            echo ' Sucesso';
        }
    }
}
