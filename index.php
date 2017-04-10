<?php
require_once 'core/init.php';

$user = DB::getInstance()->insert('users', array(
    'username' => 'Mateusz',
    'password' => 'haslo',
    'salt'     => 'salt',
    'name'     => 'Imie i nazwisko',
    'joined'   => '2017-04-09 00:00:00',
    'group'    => '1'



));


//$user = DB::getInstance()->get('users', array('username', '=', 'mat'));
//
//if(!$user->count()){
//    echo 'No user';
//}else {
//    echo $user->first()->username;
//}

//$user = DB::getInstance()->query("SELECT * FROM users");
//
//if(!$user->count()){
//    echo 'No user';
//}else {
//    foreach($user->results() as $user){
//
//        echo $user->username, '<br>';
//
//    }
//}



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