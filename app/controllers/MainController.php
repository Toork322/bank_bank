<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {
    function index() {
        echo $this->view('main');
    }

    
}