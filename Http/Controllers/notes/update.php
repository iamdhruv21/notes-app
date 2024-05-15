<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 2;

$note = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 255)) {
    $errors['body'] = 'A body of no more than 255 character is required';
}

if (count($errors)){
    view("notes/edit.view.php", [
        'heading' => "Edit Note",
        'errors' => $errors,
        'note' => $note
    ]);
    die();
}

$db->query('update notes set note = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /laracast/notes');
die();