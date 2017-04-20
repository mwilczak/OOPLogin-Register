<?php

require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');

}
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        if ($validation->passed()) {
            try {
                $user->update(array(
                        'name' => Input::get('name')
                ));
                Session::flash('home', 'Twoje dane zostały zmienione');
                Redirect::to('index.php');
            } catch (Exception $exception) {
                die($exception->getMessage());
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
        <label for="name">Imię i nazwisko</label>
        <input type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
    </div>
    <input type="submit" value="Update">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>
