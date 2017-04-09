<?php


class DB
{
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_result,
            $_count = 0;

    private function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host='. Config::get('mysql/host') .';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            echo 'Connected';
        } catch(PDOException $exception){
            die($exception->getMessage());
        }

    }

    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            self::$_instance = new DB(); //nie wykona sie jesli bedzie drugie
        }
        return self::$_instance;
    }
}