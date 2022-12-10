<?php

namespace Itworks\src\model;

use Itworks\core\Model;

/**
 * Classe responsável por gerenciar a conexão com a tabelaconta.
 */

class ContaModel
{
    //Instancia da Classe Model
    private $pdo;

    /**
     * Método Contrutor
     * @return void
     */

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(object $params)
    {
        $sql = "INSERT INTO extrato (valor, movimentacao, dataRegistro) VALUES (:valor, :movimentacao, :dataRegistro)";

        $sqlParams = [
            ':valor' => $params->valor,
            ':movimentacao' => $params->movimentacao,
            ':dataRegistro' => $params->dataRegistro
        ];

        $handle = $this->pdo->executeNonQuery($sql, $sqlParams);
        if (!$handle) {
            return -1;
        } else {
            return $this->pdo->GetLastID();
        }
    }

    public function getAll(){
        //ESCREVEMOS A CONSULTA SQL E ATRIBUIMOS A VÁRIAVEL $SQL
        $sql = 'SELECT * FROM extrato ORDER BY dataRegistro ASC';
        //EXECUTAMOS A CONSULTA CHAMANDO O MÉTODO MODELO.
        //ATRIBUIMOSO RESULTADO A VÁRIAVEL $DT
        $dt = $this->pdo->ExecuteQuery($sql);
        //DECLARA UMA LISTA INICIALMENTE NULA
        $listaExtrato = null;
        //PERCORREMOS TODAS AS LINHAS DO RESULTADO DA BUSCA
        foreach($dt as $dr){
            //ATRIBUIMOS A ULTIMA POSIÇÃO DO ARRAY O PRODUTO DEVIDAMENTE TRATADO
            $listaExtrato[] = $this->collection($dr);
        }
        //RETORNAMOS A LISTA DE PRODUTOS
        return $listaExtrato;
    }

    /**
    *CONVERTE UMA ESTRUTURA DE ARRAY VINDA DA BASE DE DADOS EN UM OBJETO DEVDAMENTE TRATADO
    *@param array|object $PARAM RECEBE O PARÂMETRO QUE É RETORNADO NA CONSULTA COM A BASE DE DADOS
    *@return object RETORNA UM OBJETO DEVIDAMENTE TRATADO COM A ESTRUTURA DE CONTA 
    */

    //OPERADOR NULL COALESCE
    public function collection($param){
        return(object)[
            'id'           => $param['id']             ?? null,
            'valor'        => $param['valor']          ?? null,
            'movimentacao' => $param['movimentacao']   ?? null,
            'dataRegistro' => $param['dataRegistro']   ?? null
        ];
    }
}
