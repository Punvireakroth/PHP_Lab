<?php


use core\Database;
use core\Validator;

$currentUserId = 1;

use core\App;

$db = App::resolve(Database::class);

// Find the corresposning note 

$note = $db->query("select * from notes where id = :id", [
    "id" => $_POST["id"]
])->findOrFail();


// Authorize the use whether user can edit or not?
authorize($note['user_id'] === $currentUserId);

// Volidate the form
$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is6 required';
}

// Update the note in database table

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
]);

// Redirect

header('location: /notes');

die();