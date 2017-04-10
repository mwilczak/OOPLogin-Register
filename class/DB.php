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
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB(); //zabezbiecz że nie wykona sie jesli bedzie drugie połączenie
        }
        return self::$_instance;
    }

    public function query($sql, $params = array())
    {
        $this->_error = false; //nie pojawi się error z poprzedniego query
        if ($this->_query = $this->_pdo->prepare($sql)) {
            if (count($params)) { //sprawdzamy czy paramatry istnieją
                $x = 1;
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            //execute query
            if ($this->_query->execute()) {
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this; //return object;
    }

    public function action($action, $table, $where = array()) //public bo może użyjemy poza
    {
        if(count($where) === 3){ //field, operaters, value = 3
            $operators = array('=', '>', '<', '>=', '<=');

            $field      = $where[0];
            $operator   = $where[1];
            $value      = $where[2];

            if(in_array($operator, $operators)){
                // $sql = "SELECT * FROM users WHERE username = 'Mat'";
                $sql = "{$action}  FROM {$table} WHERE {$field} {$operator} ?";

                if(!$this->query($sql, array($value))->error()){
                    return $this;

                }
            }
        }
        return false;
    }

    public function get($table, $where)
    {
        return $this->action('SELECT *', $table, $where);
    }

    public function delete($table, $where)
    {
        return $this->action('DELETE', $table, $where);

    }
    public function error()
    {
        return $this->_error;
    }
    public function count()
    {
        return $this->_count;
    }
}