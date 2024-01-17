<?php

use core\Database;

$currentUserId = 1;

use core\App;

$db = App::resolve(Database::class);


$note = $db->query("select * from notes where id = :id", [
    "id" => $_GET["id"]
])->findOrFail();


authorize($note['user_id'] === $currentUserId);


view("notes/show.view.php", [
    'heading' => 'Title',
    'note' => $note,
]);


