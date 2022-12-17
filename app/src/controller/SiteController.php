<?php

namespace Itworks\src\controller;

use Itworks\core\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $this->load('site/index');
    }

    public function sobre()
    {
        $this->load('site/sobre');
    }

    public function saiba()
    {
        $this->load('site/saiba');
    }
}
