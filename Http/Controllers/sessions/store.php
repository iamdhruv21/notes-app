<?php

use Core\Authenticator;
use Http\Forms\LoginForms;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForms();

if ($form->validate($email, $password)) {
    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/laracast/');
    } else {
        $form->error('email', 'Your Email and Password Does not match');
    }
}

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $_POST['email']
]);

redirect('/laracast/login');

