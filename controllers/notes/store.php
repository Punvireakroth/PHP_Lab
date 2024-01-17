<?php

use core\Database;
use core\Validator;

use core\App;

$db = App::resolve(Database::class);

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (!empty($errors)) {
    // validation issue
    return view("/notes/create.view.php", [
        'heading' => 'Create a note',
        'errors' => $errors,
    ]);
}

if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        ':body' => $_POST['body'],
        ':user_id' => 1,
    ]);


    header('location: /notes');
    die();
}

