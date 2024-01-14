<?php

use core\Database;

$currentUserId = 1;

$config = require base_path('config.php');
$db = new Database($config['database']);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note = $db->query("select * from notes where id = :id", [
        "id" => $_GET["id"]
    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);


    // form was submmited delete the current note
    $db->query("delete from notes where id = :id", [
        'id' => $_GET['id'],
    ]);

    header('location: /notes');
    exit();

} else {


    $note = $db->query("select * from notes where id = :id", [
        "id" => $_GET["id"]
    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);


    view("notes/show.view.php", [
        'heading' => 'Title',
        'note' => $note,
    ]);

}

