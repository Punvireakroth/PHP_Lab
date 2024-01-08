<?php


require "function.php";
require "Database.php";



$db = new Database();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);



// Display the data from database

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}