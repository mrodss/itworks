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
}
