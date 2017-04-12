<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if ($validation->passed()) {
            $user = new User();
            $login = $user->login(Input::get('username'), Input::get('password'));

            if ($login) {
                Redirect::to('index.php');
            } else {
                echo 'Sorka nie zalogowano';
            }

        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }

    }
}

?>

<form action="" method="post">
    <div class="field">
        <label for="username">Login</label>
        <input type="text" name="username" id="username" value=""
               autocomplete="off">
    </div>

    <div class="field">
        <label for="password">Hasło</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

    <input type="submit" name="submit" value="Zaloguj">
</form>