<?php


require "function.php";
require "Database.php";


$config = require "config.php";


$db = new Database($config['database']);

$posts = $db->query("select * from posts")->fetchAll();



// Display the data from database

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}