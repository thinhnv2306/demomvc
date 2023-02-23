<?php
class App {
    private $controller = "home";
    private $method = "index";
    private $params = [];

    function __construct(){
        $url = $this->splitURL();
        if(file_exists("../app/controllers/" . strtolower($url[0]).".php")){
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
    }

    function splitURL(){
        if(isset($_GET['url'])){
        return explode("/",trim($_GET['url'],"/"));
        }
    }
}