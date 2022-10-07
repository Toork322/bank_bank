<?php

class MainController extends Controller {
    function index() {
        echo $this->view('main');
    }

}