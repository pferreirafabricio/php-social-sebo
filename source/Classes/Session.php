<?php

namespace Source\Classes;

class Session
{
    public static function initialize()
    { 
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    public static function setValue(string $key, $value): void
    {     
        self::initialize();   
        $_SESSION[$key] = $value;
    }

    public static function getValue(string $key)
    {
        self::initialize();
        return $_SESSION[$key] ?? null;
    }

    public static function destroy(): void
    {
        self::initialize();
        session_destroy();
    }
}