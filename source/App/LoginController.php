<?php

namespace Source\App;

use Source\App\Controller;

class LoginController extends Controller
{
    #region External

    public function index(): void
    {
        echo $this->view('client/login');
    }

    public function register(): void
    {
        echo $this->view('client/register');
    }

    #endregion

    #region Internal

    public function auth(): void 
    {
        $filters = [
            'email' => FILTER_SANITIZE_STRING,
            'password' => FILTER_SANITIZE_STRING,
        ];

        dd(postAll($filters));
    }

    
}