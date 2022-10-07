<?php

class Controller
{
    public function view($view, $data = array()) {
        extract($data);
        if (file_exists("../app/views/".$view.".view.php")) {
            require "../app/views/".$view.".view.php";
        } else {
            require "../app/views/404.view.php";
        }
    }
}
