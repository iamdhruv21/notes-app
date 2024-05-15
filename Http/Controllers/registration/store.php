<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(! Validator::email($email)){
    $errors['email'] = 'Please Provide a Valid email address';
}

if(! Validator::string($password, 7, 255)){
    $errors['password'] = 'Please Provide a Password of at-least 7 character';
}

if(! empty($errors)){
    view('registration/create.view.php', [
        'errors' => $errors,
        'heading' => 'Register Here!'
    ]);
    die();
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user){
    header('location: /laracast/');
    exit();
} else {
$db->query('insert into users(username, email) values(:password, :email);', [
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'email' => $email
]);

session_start();

(new Authenticator)->login([
    'email' => $email
]);

header('location: /laracast/');
exit();
}