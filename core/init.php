<?php
session_start();

$GLOBALS['config'] = array(

    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'admin',
        'password' => 'admin',
        'db' => 'oopLogin'
    ),
    'remember' => array(
        'cookie_name' => 'ciacho',
        'cookie_expiry' => 2700 // 2700 to 45 minut

    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )

);

//require_once 'class/Config.php';
//require_once 'class/Cookie.php';
//require_once 'class/DB.php';
//require_once 'class/Hash.php';

//zamiast dodawać każdy plik możemy użyć funkcji która załaduje automatycznie wszystkie klasy
//gdy trzeba

spl_autoload_register(function ($class) {
    require_once 'class/' . $class . '.php';  //$class = nazwa klasy
});

require_once 'function/sanitize.php';