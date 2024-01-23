<?php

use core\Database;

use core\App;

$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->query("select * from notes where id = :id", [
    "id" => $_POST["id"]
])->findOrFail();


authorize($note['user_id'] === $currentUserId);


// form was submmited delete the current note
$db->query("delete from notes where id = :id", [
    'id' => $_GET['id'],
]);

header('location: /notes');


exit();





