<?php

class Router {
    protected $controller = 'mainController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $URL = $this->getURL();
        # проверяем существует ли нужный контроллер
        # если нет, то используем дефолтный
        if(file_exists("../app/controllers/".$URL[0]."Controller.php")) {
            $this->controller = ucfirst($URL[0]."Controller");
            unset($URL[0]);
        }

        require "../app/controllers/".$this->controller.".php";
        $this->controller = new $this->controller();
        
        # есть ли нужный метод контроллера
        if(isset($URL[1])) {
            if(method_exists($this->controller, $URL[1])) {
                $this->method = ucfirst($URL[1]);
                unset($URL[1]);
            }
        }
        
        $URL = array_values($URL);
        $this->params = $URL;
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function getURL() {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        }
        else {
            $url = "main";
        };
            
        return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL);
    } 
}
