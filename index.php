<?php
require_once 'core/init.php';


$user = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('mat'));

if($user->error()){
    echo 'No user';
}else {
    echo 'Ok';
}

//echo Config::get('mysql/host'); // localhost 127.0.0.1


//$users = DB::getInstance()->query('SELECT username FROM users');
//if ($users->count()){
//    foreach($users as $user){
//        echo $user->username;
//    }
//}

//$users = DB::getInstance()->get('users', array('username', '=', 'mat'));
//
//if (!$users->count()){
//    echo 'No user';
//}else {
//    echo 'Hello user';
//}