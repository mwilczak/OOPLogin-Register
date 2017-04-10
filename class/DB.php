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
        } catch(PDOException $exception){
            die($exception->getMessage());
        }

    }

    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            self::$_instance = new DB(); //zabezbiecz że nie wykona sie jesli bedzie drugie połączenie
        }
        return self::$_instance;
    }

    public function query($sql, $params = array())
    {
        $this->_error = false; //nie pojawi się error z poprzedniego query
        if($this->_query = $this->_pdo->prepare($sql)){
            if(count($params)){ //sprawdzamy czy paramatry istnieją
                $x=1;
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            //execute query
            if($this->_query->execute()){
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }else {
                $this->_error = true;
            }
        }
        return $this; //return object;
    }
    public function error()
    {
        return $this->_error;
    }
}