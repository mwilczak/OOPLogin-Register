<?php
require_once 'core/init.php';

if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User(); //obecny user
if ($user->isLoggedIn()) {
    ?>
    <h3>Witaj <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</h3>

    <ul>
        <li><a href="logout.php">Wyloguj</a></li>
        <li><a href="update.php">Edytuj profil</a></li>
        <li><a href="changePassword.php">Zmień hasło</a></li>
    </ul>

    <?php
    if($user->hasPermission($key)) {
        echo '<p>Jesteś administratorem!</p>';
    }

} else {
    echo '<h2>Musisz się <a href="login.php">zalogować</a> albo <a href="register.php">zarejestrować</a></h2>';
}


//echo $user->data()->username;
//$anotherUser = new User(14); // kolejny

//echo Session::get(Config::get('session/session_name'));


//$user = DB::getInstance()->update('users', 3, array(
////    'username' => 'Mateusz',
//    'password' => 'nowehaslo',
////    'salt'     => 'salt',
//    'name' => 'Imie i beznawizka',
////    'joined'   => '2017-04-09 00:00:00',
////    'group'    => '1'
//
//
//));


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