<?php
/*
        * App Core Class
        * Ctreates URL And Loads core Controller  
        * URL Format - /controller/method/params
    */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct()
    {
        $url = $this->getUrl();

        //check if conroller exist and set it as current controller 
        if (isset($url)) {
            if (file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
                $this->currentController = ucwords($url[0]);
                //unset 0 index
                unset($url[0]);
            }
        }
        // Require the controller
        require_once "../app/controllers/" . $this->currentController . ".php";
        $this->currentController = new $this->currentController;




        // Check for the second part of url 
        if (isset($url[1])) {
            //check if method exists in url
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
