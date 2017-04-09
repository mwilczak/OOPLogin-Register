<?php
require_once 'core/init.php';


echo Config::get('mysql/host'); // localhost 127.0.0.1


//$user = DB::getInstance()->get('users', array('username', '=', 'mat'));
//
//if (!$user->count()){
//    echo 'No user';
//}else {
//    echo 'Hello user';
//}