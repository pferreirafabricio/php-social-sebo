<?php

namespace Source\Classes;

use Source\Classes\Session;

class Security 
{
    public static function protect(): void
    {
        $logged = Session::getValue('logged');
        $ip = Session::getValue('ip');

        if (!$logged || $logged == null) 
            redirect(SECURITY_REDIRECT);
        
        if ($_SERVER['REMOTE_ADDR'] != $ip)
            redirect(SECURITY_REDIRECT);
    }
}