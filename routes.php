<?php

$router->get('/laracast/', 'index.php');
$router->get('/laracast/about', 'about.php');
$router->get('/laracast/contact', 'contact.php');

$router->get('/laracast/notes', 'notes/index.php')->only('auth');
$router->get('/laracast/note', 'notes/show.php');
$router->delete('/laracast/note', 'notes/destroy.php');

$router->get('/laracast/note/edit', 'notes/edit.php');
$router->patch('/laracast/note', 'notes/update.php');

$router->get('/laracast/notes/create', 'notes/create.php');
$router->post('/laracast/notes', 'notes/store.php');

$router->get('/laracast/register', 'registration/create.php')->only('guest');
$router->post('/laracast/register', 'registration/store.php')->only('guest');

$router->get('/laracast/login', 'sessions/create.php')->only('guest');
$router->post('/laracast/sessions', 'sessions/store.php')->only('guest');
$router->delete('/laracast/sessions', 'sessions/destroy.php')->only('auth');
