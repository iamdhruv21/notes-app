<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

//    $config = require base_path("config.php");
//    $db = new Database($config['database']);

$currentUserId = 2;

$notes = $db->query('SELECT * FROM notes WHERE id = :id;', [
    'id' => $_POST['id']
])->findOrFail();

authorize($notes['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /laracast/notes');




