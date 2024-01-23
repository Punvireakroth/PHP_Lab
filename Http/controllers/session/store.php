<?php

use core\App;
use core\Database;
use Http\Forms\LoginForm;

// login the user if the credential match

$db = App::resolve(Database::class);


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('sessions/create.view.php', ['errors' => $form->errors()]);
}
;

// match the credential 
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // we have a user 

    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();
    }
}




return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account for that email address and password',
    ]
]);