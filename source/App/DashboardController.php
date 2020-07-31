<?php

namespace Source\App;

use Source\App\Controller;
use Source\Classes\Security;

class DashboardController extends Controller
{
    public function __construct()
    {
        Security::protect();
    }

    public function index(): void
    {
        echo $this->view('client/dashboard/main');
    }
}