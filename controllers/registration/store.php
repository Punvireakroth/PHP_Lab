<?php
use core\Validator;
use core\Database;
use core\App;

$email = $_POST['email'];

$password = $_POST['password'];


// Validate input 
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = "Please provide an valid email address";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide atleast 7 characters password";
}


if (!empty($errors)) {
    return view('registration/create.view.php', ['errors' => $errors]);
}


$db = App::resolve(Database::class);
// check if user already existed
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


// If yes -> Login page

if (!$user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password // NEVER store database passwords in clear text. We'll fix this in the login form episode. :)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}


