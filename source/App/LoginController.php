<?php

namespace Source\App;

use Source\App\Controller;
use Source\Database\UserDB;
use Source\Classes\Session;
use Source\Classes\Security;

class LoginController extends Controller
{   
    #region External

    public function index(): void
    {
        echo $this->view('client/user/login');
    }

    public function register(): void
    {
        echo $this->view('client/user/register');
    }

    public function edit(): void 
    {
        Security::protect();
        echo $this->view('client/user/edit', [
            'user' => (new UserDB)->getUserById(Session::getValue('id')),
        ]);
    }

    #endregion

    #region Internal

    public function auth(): void 
    {
        $email = trim(post('email', FILTER_SANITIZE_EMAIL));
        $password = post('password');
        
        $user = (new UserDB())->getUserByEmail($email);

        if (!$user) {
            echo $this->error("Email incorrect!", [], 400, "login");
        }

        if (!password_verify($password, $user->getPassword())) {
            echo $this->error("Password incorrect!", [], 400, "login");
        }
        
        $userName = explode(' ', $user->getName());

        Session::setValue('id', $user->getId());
        Session::setValue('name', mb_substr($userName[0], 0, strlen($userName[0])));
        Session::setValue('ip', $_SERVER['REMOTE_ADDR']);
        Session::setValue('logged', true);

        redirect(BASE . 'dashboard/');
    }

    public function logout(): void
    {
        Session::destroy();
        redirect(BASE . 'login/');
    }
}