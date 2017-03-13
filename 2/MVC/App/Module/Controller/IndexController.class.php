<?php

namespace App\Module\Controller;

class IndexController
{
    public function index() {
        new \App\Module\Model\HelloModel();
    }
}