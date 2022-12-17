<?php
// $this->get('/', 'HomeController@home');
// $this->get('/home', 'HomeController@home');
// // $this->get('/', 'ContaController@index');
// // $this->get('/novo', 'ContaController@novo');
// $this->post('/conta-salvar', 'ContaController@salvar');
// $this->get('/conta-editar', 'ContaController@editar');

$this->post('/', 'SiteController@index');

$this->get('/form', 'curriculoController@criarCurriculo');
$this->post('/form-salvar', 'curriculoController@salvarCurriculo');
$this->get('/envio-arquivo', 'curriculoController@upload');
$this->post('/arquivo-salvar', 'curriculoController@salvarUpload');
$this->get('/cadastro-concluido', 'curriculoController@sucesso');
