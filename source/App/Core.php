<?php

namespace Source\App;

class Core
{
    private $uri;
    private $method;
    private $controller;
    private $params = [];

    public function __construct()
    {
        $this->getUri();
        $this->controller = $this->getController();
        $this->method = $this->getMethod();
        $this->params = $this->getParams();
        $this->execute();
    }
    
    /**
     * Get the full URI and conver to an array
     *
     * @return void
     */
    private function getUri()
    {
        $fullUri = $_SERVER['REQUEST_URI'];
        $fullUri = str_replace('?', '/', $fullUri);
        $uriArray = explode('/', $fullUri);
        $uriArray = array_filter($uriArray);
        $uriArray = array_values($uriArray);

        for ($index = 0; $index < INDEXES_TO_REMOVE; $index++) 
            unset($uriArray[$index]);
            
        $uriArray = array_values($uriArray);
        $this->uri = $uriArray;
    }
    
    /**
     * Get the controller name in URI
     *
     * @return void
     */
    private function getController()
    {
        $controllerName = 'Web';
        if (isset($this->uri[0])) {
            $controllerName = ucfirst($this->uri[0]);
        }

        $controller = "Source\\App\\{$controllerName}Controller";

        if (!class_exists($controller))
            dd('Oops! Caminho inválido');

        return $controller;
    }
    
    /**
     * Get the method name in URI
     *
     * @return void
     */
    private function getMethod()
    {
        $methodName = 'home';
        if (isset($this->uri[1])) {
            $methodName = $this->uri[1];
        }
            
        if (!method_exists($this->controller, $methodName)) 
            dd('Oops! Ação inválida');

        return $methodName;
    }
    
    /**
     * Get the params in URI if they exists
     *
     * @return void
     */
    public function getParams()
    {
        $allParams = [];

        if (!isset($this->uri[2]))
            return $allParams;
        
        for ($index = 2; $index < count($this->uri); $index++)
            $allParams[] = $this->uri[$index];

        return $allParams;
    }
    
    /**
     * Execute the method in the controller
     *
     * @return void
     */
    private function execute()
    {
        call_user_func([
            new $this->controller,
            $this->method
        ], $this->params);
    }
}