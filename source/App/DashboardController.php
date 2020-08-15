<?php

namespace Source\App;

use Source\App\Controller;
use Source\Business\BookDB;
use Source\Classes\Security;
use Source\Classes\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        Security::protect();
    }

    public function index(): void
    {
        echo $this->view('client/dashboard/main', [
           'books' => (new BookDB)->getBookByUserId(Session::getValue('id')),
        ]);
    }
}