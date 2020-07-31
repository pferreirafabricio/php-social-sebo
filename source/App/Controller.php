<?php

namespace Source\App;

use Source\Classes\Session;

class Controller 
{    
    /**
     * Render a specifc view
     *
     * @param  string $view Name of the view without extension
     * @param  mixed $data Data to be exbited in view
     * @return void
     */
    protected function view(string $view, $data = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('/');
        $twig = new \Twig\Environment($loader);

        $twig->addGlobal('BASE', BASE);
        $twig->addGlobal('DATE_TIME', DATE_TIME);
        $twig->addGlobal('HOST', HOST);

        $twig->addGlobal('userName', Session::getValue('name'));
        
        echo $twig->render("{$view}.twig.php", $data);
    }
    
    /**
     * Render a error screen
     *
     * @param  string $title Title of the screen
     * @param  string $errors Errors to be displayed for the user
     * @return void
     */
    protected function error(
        string $title,
        array $errors = [],
        int $statusCode = 400,
        string $redirectTo = ''): void
    {
        http_response_code($statusCode);
        $this->view('partials/messages/error', [
            'title' => $title,
            'errors' => $errors,
            'errorCode' => $statusCode,
            'redirectTo' => $redirectTo,
        ]);
        
        return;
    }

    protected function success(string $title, int $statusCode = 200, string $redirectTo = ''): void
    {
        http_response_code($statusCode);
        $this->view('partials/messages/success', [
            'title' => $title,
            'redirectTo' => $redirectTo,
        ]);
        
        return;
    }
}