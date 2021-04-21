<?php

class App
{
    //The default controller
    protected $controller = 'home';

    //The default method of the default controller
    protected $method = 'index';

    //To pass params to the actual method e.g 'home/index/1' will pass 1 to the Home Controller's index method
    protected $params = [];

    //When an App object instantiated, call the actual controller and method
    public function __construct()
    {
        $url = $this->parseUrl();

        // Check if the controller exists, then set new controller's name
        if (file_exists('app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once 'app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        // Check if the method exists, then set the new method's name
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Check if you pass or not any params
        $this->params = $url ? array_values($url) : [];

        // Call the actual controller and its method with the params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }


    /**
     * Set the url
     * 
     * @return array
     * 
     * e.g array[0] = project, array[1] = index ...
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {

            $rtrim = rtrim($_GET['url'], '/');
            $filter_santitize = filter_var($rtrim, FILTER_SANITIZE_URL);
            $explode = explode('/', $filter_santitize);
            return $explode;
        }
    }
}