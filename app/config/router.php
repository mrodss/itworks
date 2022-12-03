<?php

#http://localhost:8081/
#http://localhost:8081/home

//EXEMPLO:
$this->get('/', 'HomeController@home');
$this->get('/home', 'HomeController@home');
$this->get('/extrato', 'ContaController@extrato');