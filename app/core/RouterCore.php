<?php
// CHAMANDO O NAMESPACE
namespace Itworks\core;
// ABERTURA DA CLASSE ROUTERCORE
class RouterCore
{
    // DECLARANDO AS VARIÁVEIS
    private $uri;
    private $method;
    private $getArr = [];
    // FUNÇÃO __construct()
    public function __construct()
    {
        // VARIAVEL "$this" ACESSANDO A FUNÇÃO "initial()"
        $this->initial();
        // INCLUINDO O CAMINHO INTEIRO ATÉ O ARQUIVO "router.php"
        require_once('../app/config/router.php');
        // VARIAVEL "$this" ACESSANDO A FUNÇÃO "execute()"
        $this->execute();
    }
    // FUNÇÃO initial()
    private function initial()
    {
        // VÁRIAVEL "$this" ACESSADO METHOD, RECEBENDO A VÁRIAVEL "$_SERVER['REQUEST_METHOD']"
        $this->method = $_SERVER['REQUEST_METHOD'];
        // VARIAVEL "$uri_initial" RECEBENDO "$_SERVER['REQUEST_METHOD']"
        $uri_initial = $_SERVER['REQUEST_URI'];

        // SE A PRIMEIRA OCORRÊNCIA TIVER A VÁRIAVEL "uri_initial" ou '?'
        if (strpos($uri_initial, '?'))
            // VÁRIAVEL "$uri_initial" RECEBE A FUNÇÃO "mb_substr" COM OS PARÂMETROS
            $uri_initial = mb_substr($uri_initial, 0, strpos($uri_initial, '?'));
        // VÁRIAVEL "$ex" RECEBE a FUNÇÃO "explode" QUE ESTÁ ENCONTRANDO SÍMBOLOS
        $ex = explode('/', $uri_initial);

        // VÁRIAVEL "uri" RECEBE "array_values" TENDO COMO PARÂMETRO O "array_filter" DA VÁRIAVEL "$ex"
        $uri = array_values(array_filter($ex));

        // CRIANDO UM LAÇO DE REPETIÇÃO
        // PARA $i = 0; $i SENDO MENOR QUE "UNSET_URI_COUNT"; $i ACRESCENTA +1
        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            // DESTRÓI A VÁRIAVEL "$uri[$i]"
            unset($uri[$i]);
        }

        // VÁRIAVEL "$this" ACESSA "$uri" RECEBENDO UM IMPLODE (RETORNA UMA STRING CONTENDO OS ELEMENTOS DA MATRIZ NA MESMA ORDEM)
        $this->uri = implode('/', $this->normalizeURI($uri));

        // SE "DEBUG_URI"
        if (DEBUG_URI) {
            // PRINTANDO '<pre>'
            echo '<pre>';
            // PRINTANTDO A VÁRIAVEL "$this" ACESSANDO "uri"
            print_r($this->uri);
            // PRINTANDO '<pre>'         
            echo '</pre>';
        }
    }

    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':
                $this->executePost();
                break;
        }
    }

    private function executeGet()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }
            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    break;
                } else {
                    $this->executeController($get['call']);
                }
            }
        }
    }

    private function executePost()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }

            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }

                $this->executeController($get['call']);
            }
        }
    }

    private function executeController($get)
    {
        $ex = explode('@', $get);
        // if (!isset($ex[0]) || !isset($ex[1])) {
        //     (new \app\src\controller\MessageController)->message('Dados inválidos', 'Controller ou método não encontrado: ' . $get, 404);
        //     return;
        // }

        $cont = 'Itworks\\src\\controller\\' . $ex[0];
        // if (!class_exists($cont)) {
        //     (new \app\src\controller\MessageController)->message('Dados inválidos', 'Controller não encontrada: ' . $get, 404);
        //     return;
        // }


        // if (!method_exists($cont, $ex[1])) {
        //     (new \app\src\controller\MessageController)->message('Dados inválidos', 'Método não encontrado: ' . $get, 404);
        //     return;
        // }

        call_user_func_array([
            new $cont,
            $ex[1]
        ], []);
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function post($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }
}
