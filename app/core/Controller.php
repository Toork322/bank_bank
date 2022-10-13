<?php

namespace app\core;

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

    public function redirect($link) {
	    header("Location: ". ROOT . "/".trim($link, "/"));
		die;
	}
}
