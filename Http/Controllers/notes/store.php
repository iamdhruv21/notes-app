<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['body'], 1, 255)) {
    $errors['body'] = 'A body of no more than 255 character is required';
}

if(! empty($errors)){
    view("notes/create.view.php",[
        'heading' => "Create a Note",
        'errors' => $errors
    ]);
    die();
}

$db->query('insert into notes(note, user_id) values(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 2
]);

header('location: /laracast/notes');
die();
