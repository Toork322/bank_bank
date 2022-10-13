<?php
namespace app\core;

class Router {
    protected $controller = 'MainController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $URL = $this->get_url();

        #предполагаемая внутренняя директория
        $presumably_inner_path = "";
        #нужная внутренняя директория
        $real_inner_path = "";

        #ищем нужный контрллер
        foreach ($URL as $presumably_controller) {
            $presumably_inner_path .= $presumably_controller."/";
            #существует ли вообще такой контроллер?
            if(file_exists("../app/controllers/".$presumably_inner_path . $presumably_controller."Controller.php")) {
                #существует -> делаем его основным и извлекаем из массива путей
                $real_inner_path = $presumably_inner_path;
                $this->controller = ucfirst($presumably_controller."Controller"); 
                array_shift($URL); 
            } else {
                #не существует -> берём раннее установленный(либо дефолтный) 
                break;
            }
        }  
        
        #require ("../app/controllers/".$real_inner_path . $this->controller.".php");
        $string = str_replace('/', '\\', "\app\controllers\\".$real_inner_path . $this->controller);
        $this->controller = new $string();
        
        # есть ли нужный метод контроллера
        if(method_exists($this->controller, $presumably_method = array_shift($URL))) {
            $this->method = ucfirst($presumably_method);
        }
        # остальное - параметры
        $URL = array_values($URL);
        $this->params = $URL;
        # вызов метода
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function get_url() {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        }
        else {
            $url = 'main';
        };
            
        return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL);
    } 
}
