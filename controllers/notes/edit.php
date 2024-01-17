<?php


use core\Database;

$currentUserId = 1;

use core\App;

$db = App::resolve(Database::class);


$note = $db->query("select * from notes where id = :id", [
    "id" => $_GET["id"]
])->findOrFail();


authorize($note['user_id'] === $currentUserId);


view("/notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note,
]);



