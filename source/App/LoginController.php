<?php

namespace Source\App;

use Source\App\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        echo $this->view('client/login');
    }
}