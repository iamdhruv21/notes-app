<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

//$notes = $db->query('SELECT * FROM notes WHERE user_id = :user and id = :id;', [
//    'user' => 2,
//    'id' => $_GET['id']
//])->fetch();

    $notes = $db->query('SELECT * FROM notes WHERE id = :id;', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($notes['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => "Note",
        'notes' => $notes
    ]);


