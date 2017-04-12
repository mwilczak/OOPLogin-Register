<?php
require_once 'core/init.php';

//var_dump(Token::check(Input::get('token')));

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users' //sprawdza czy już jest uzytkownik
            ),
            'password' => array(
                'required' => true,
                'min' => 6

            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
//    echo Input::get('username');    // echo $_POST['username']

        if ($validation->passed()) {
            //register
            $user = new User();

            $salt = Hash::salt(32);
            try {

                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'name' => Input::get('name'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));

                Session::flash('home', 'Rejestracja zakończona powodzeniem | Można się logować');
                Redirect::to('index.php');

            } catch (Exception $exception) {
                die($exception->getMessage());
            }
//            Session::flash('success', 'Rejestracja zakończona powodzeniem');
//            header('Location: index.php');
        } else {
            //error
//        print_r($validation->errors());
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}


?>


<form action="" method="POST">
    <div class="field">
        <label for="username">Nazwa użytkownika</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>"
               autocomplete="off">
    </div>

    <div class="field">
        <label for="password">Podaj hasło</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="password_again">Powtórz hasło</label>
        <input type="password" name="password_again" id="password_again">
    </div>

    <div class="field">
        <label for="name">Imię i nazwisko</label>
        <input type="name" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>"">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

    <input type="submit" name="submit" value="Zarejestruj">
</form>

