<?php
// $this->get('/', 'HomeController@home');
// $this->get('/home', 'HomeController@home');
$this->get('/index', 'ContaController@index');

$this->get('/', 'ContaController@novo');
$this->post('/conta-salvar', 'ContaController@salvar');

