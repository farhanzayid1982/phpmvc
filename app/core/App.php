<?php

class App {
    protected $controller = 'Home'; //default controller
    protected $method = 'index'; //default method
    protected $params = []; //default params
    public function __construct()
    {
        $url = $this->parseURL();

        //Jika url tidak ada controller, methode dan parameter 
            ///array $url[0] diberi nilai string kosong.
        if(!isset($url)) {
            $url[0] = '';
        }
        //var_dump($url);
        //echo 'OK!';
        if(file_exists('../app/controllers/'. $url[0] . '.php')) {
            $this->controller=$url[0];
            //var_dump($url);
            unset($url[0]);
            //var_dump($url);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //Handle Method
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //Paramter
        if(!empty($url)) {
            $this->params = array_values($url);
            //var_dump($url);
        }

        //Jalankan controller dan method, serta kirimkan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}