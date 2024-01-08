<?php


require "function.php";

require "router.php";
require "Database.php";


$config = require('config.php');


$db = new Database($config['database']);


$notes = $db->query("select * from notes")->fetchAll();

// dd($notes);



// $id = $_GET['id'];

// $query = "select * from notes where id = 3";

// $posts = $db->query($query, [':id' => $id])->fetch();

// dd($posts);


